<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CelPay;
use App\Models\Niveau;
use App\Models\CinetPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CinetPayTransaction;
use App\Http\Controllers\Controller;
use App\Models\CinetPaySuccess;

class CinetPayController extends Controller
{
    /**
     * Notification après paiement
     */
    public function notification(Request $request)
    {
        //Récupération des infos CinetPay en fonction du pays
        $cinetpay = CinetPay::where('id_pays', 1)->first();

        //Récupération de la transaction
        $transaction = CinetPayTransaction::where('transaction_id', $request->cpm_trans_id)->first();

        //Vérification du statut du paiement et MAJ
        if ($transaction && $transaction->status != "ACCEPTED") {
            //Récupération de l'état du paiement
            $paiement = get_statut_paiment_cinetpay($cinetpay, $request->cpm_trans_id);
            if ($paiement) {
                //MAJ de la transaction
                $transaction->code = $paiement->code;
                $transaction->message = $paiement->message;
                $transaction->status = $paiement->data->status;
                $transaction->payment_method = $paiement->data->payment_method;
                $transaction->operator_id = $paiement->data->operator_id;
                $transaction->payment_date = nullable($paiement->data->payment_date);
                $transaction->cel_phone_num = $request->cel_phone_num;
                $transaction->save();

                //S'il ya succès du paiement
                if ($paiement->code == "00") {
                    //Insertion dans la table 'cinetpay_success'
                    CinetPaySuccess::create([
                        'id_cinetrans' => $transaction->id_cinetrans,
                        'identifiant' => $transaction->identifiant,
                        'id_transaction' => $transaction->transaction_id,
                        'montant' => $transaction->montant,
                        'moyen_paiement' => get_payment_method($paiement->data->payment_method),
                        'id_operateur' => $paiement->data->operator_id,
                        'date_paiement' => $paiement->data->payment_date,
                    ]);

                    //MAJ du solde CelPay
                    $celpay = CelPay::where('identifiant', $transaction->identifiant)->first();
                    $celpay->solde = $celpay->solde + $transaction->montant;
                    $celpay->updated_at = DB::raw('NOW()');
                    $celpay->save();
                }
            }

            return response()->json([
                'code' => $paiement->code,
                'message' => "Mise à jour effectuée avec succès."
            ]);
        }

        return response()->json([
            'code' => $transaction->code ?? null,
            'message' => "Aucune action requise."
        ]);
    }


    /**
     * Redirection après paiement
     */
    public function retour(Request $request)
    {
        //Récupération de la transaction
        $transaction = CinetPayTransaction::where('transaction_id', $request->transaction_id)->first();

        //Rédirection en fonction de l'utilisateur
        if ($transaction && $transaction->utilisateur->top_user == '1') {
            return redirect()->route('admin-compte-celpay');
        }
        elseif ($transaction && $transaction->utilisateur->top_user == '2') {
            return redirect()->route('eleve-compte-celpay');
        }
        elseif ($transaction && $transaction->utilisateur->top_user == '3') {
            return redirect()->route('enseignant-compte-celpay');
        }
        elseif ($transaction && $transaction->utilisateur->top_user == '4') {
            return redirect()->route('parent-compte-celpay');
        }
        else {
            return redirect()->route('accueil');
        }
    }
}
