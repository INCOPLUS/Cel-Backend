<?php

namespace App\Http\Controllers\Backend\Eleve;

use App\Models\CelPay;
use App\Models\Erreur;
use App\Models\Montant;
use App\Models\CinetPay;
use Illuminate\Http\Request;
use App\Models\CelpayTransaction;
use Illuminate\Support\Facades\DB;
use App\Models\CinetPayTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CelPayController extends Controller
{

    /**
     * Rechargement via CinetPay (Sans Redirection)
     */
    public function rechargement(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'montant' => 'required|exists:montant,id_montant',
        ];

        //Messages d'erreurs
        $messages = [
            'montant.required' => "Veuillez renseigner le montant du rechargement.",
            'montant.exists' => "Le montant sélectionné est incorrect.",
        ];

        //Validation des données
        $validator = Validator::make($request->all(), $rules, $messages);

        //Si la validation echoue, on affiche les erreurs
        if ($validator->fails()) {
            return response()->json([
                'message' => "Erreur de validation des données.",
                'erreurs' => $validator->errors()->all()
            ]);
        }
        
        /**
         * Initialisation de la transaction
         */
        try {
            //Récupération des données
            $user = Auth::user();
            $cinetpay = CinetPay::where('id_pays', 1)->first();
            $montant = Montant::find($request->montant)->libelle_montant;
            // $transaction_id = DB::select("SELECT IF(COUNT(id_cinetrans)=0, 'CELPAY00001', IF(LENGTH(MAX(id_cinetrans))<=5, CONCAT('CELPAY', LPAD(MAX(id_cinetrans)+1,5,'0')), CONCAT('CELPAY', MAX(id_cinetrans)+1))) AS transaction_id FROM cinetpay_transactions")[0]->transaction_id;
            $transaction_id = DB::select("SELECT IF(COUNT(id_cinetrans)=0, 'TESTPAY00001', IF(LENGTH(MAX(id_cinetrans))<=5, CONCAT('TESTPAY', LPAD(MAX(id_cinetrans)+1,5,'0')), CONCAT('TESTPAY', MAX(id_cinetrans)+1))) AS transaction_id FROM cinetpay_transactions")[0]->transaction_id;

            //Insertion dans la table 'cinetpay_transactions'
            CinetPayTransaction::create([
                'id_cinetpay' => $cinetpay->id_cinetpay,
                'identifiant' => $user->identifiant,
                'transaction_id' => $transaction_id,
                'montant' => $montant,
            ]);

            //On retourne les données
            return response()->json([
                "apikey" => $cinetpay->apikey,
                "site_id" => $cinetpay->site_id,
                "notify_url" => route('cinetpay-notification'),
                "transaction_id" => $transaction_id,
                "amount" => $montant,
                "currency" => $cinetpay->currency,
                "channels" => "ALL",
                "description" => "RECHARGEMENT DE COMPTE CELPAY",
                "customer_name" => explode(' ', $user->nom_prenom, 2)[0],
                "customer_surname" => explode(' ', $user->nom_prenom, 2)[1] ?? "",
                "customer_email" => $user->email ?? "",
                "customer_phone_number" => "",
                "customer_address" => $user->quartier ?? "",
                "customer_city" => $user->ville->nom_ville ?? "Abidjan",
                "customer_country" => $cinetpay->customer_country,
                "customer_state" => $cinetpay->customer_state,
                "customer_zip_code" => $cinetpay->customer_zip_code,
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    /**
     * Rechargement via CinetPay (Redirection)
     */
    public function rechargement2(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'montant' => 'required|exists:montant,id_montant',
        ];

        //Messages d'erreurs
        $messages = [
            'montant.required' => "Veuillez renseigner le montant du rechargement.",
            'montant.exists' => "Le montant sélectionné est incorrect.",
        ];

        //Validation des données
        $validator = Validator::make($request->all(), $rules, $messages);

        //Si la validation echoue, on affiche les erreurs
        if ($validator->fails()) {
            return response()->json([
                'message' => "Erreur de validation des données.",
                'erreurs' => $validator->errors()->all()
            ]);
        }
        
        /**
         * Initialisation de la transaction
         */
        try {
            //Récupération de l'utilisateur connecté
            $user = Auth::user();

            //Récupération des infos CinetPay en fonction du pays de l'utilisateur
            $cinetpay = CinetPay::where('id_pays', 1)->first();

            //Récupération du montant
            $montant = Montant::find($request->montant)->libelle_montant;

            //ID de la transaction
            $transaction_id = "TESTPAY-0009";
            // $transaction_id = DB::select("SELECT IF(COUNT(id_cinetrans)=0, 'CELPAY00001', IF(LENGTH(MAX(id_cinetrans))<=5, CONCAT('CELPAY', LPAD(MAX(id_cinetrans)+1,5,'0')), CONCAT('CELPAY', MAX(id_cinetrans)+1))) AS transaction_id FROM cinetpay_transactions")[0]->transaction_id;

            //Génération du lien de paiement Cinetpay
            $generation = get_lien_cinetpay($user, $cinetpay, $montant, $transaction_id);

            //Si la génération s'est bien passée
            if ($generation && $generation->code == '201') {
                //Récupération du lien de paiement
                $payment_token = $generation->data->payment_token;
                $payment_url = $generation->data->payment_url;
                $api_response_id = $generation->api_response_id;

                //Insertion dans la table 'cinetpay_transactions'
                CinetPayTransaction::create([
                    'id_cinetpay' => $cinetpay->id_cinetpay,
                    'identifiant' => $user->identifiant,
                    'transaction_id' => $transaction_id,
                    'montant' => $montant,
                    'payment_token' => $payment_token,
                    'payment_url' => $payment_url,
                    'api_response_id' => $api_response_id,
                ]);

                //On retourne un message de succès
                return response()->json([
                    'resultat' => "Succes",
                    'message' => "Votre demande a été prise en compte.<br>Vous serez redirigé vers la page de CinetPay pour confirmer le paiement.",
                    'payment_url' => $payment_url,
                ]);
            }

            //On retourne un message d'échec
            return response()->json([
                'resultat' => "Echec",
                'message' => "Impossible d'initier la transaction.<br>Veuillez réessayer ultérieurement.",
            ]);

        } catch (\Exception $ex) {
            //Sauvegarde de l'erreur
            Erreur::create([
                'utilisateur' => Auth::user()->identifiant, 'action' => "Génération du lien de paiement CinetPay", 'erreur' => $ex,
            ]);
            
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }

    /**
     * Rechargement via CelPay
     */
    public function transfert(Request $request)
    {
        //Règles de validation des données
        $rules = [
            'montant' => 'required|exists:montant,id_montant',
            'beneficiaire' => 'required|exists:utilisateurs,identifiant',
        ];

        //Messages d'erreurs
        $messages = [
            'montant.required' => "Veuillez renseigner le montant du transfert.",
            'montant.exists' => "Le montant sélectionné est incorrect.",
            'beneficiaire.required' => "Veuillez renseigner le bénéficiaire du transfert.",
            'beneficiaire.exists' => "Le bénéficiaire sélectionné est incorrect.",
        ];

        //Validation des données
        $validator = Validator::make($request->all(), $rules, $messages);

        //Si la validation echoue, on affiche les erreurs
        if ($validator->fails()) {
            return response()->json([
                'message' => "Erreur de validation des données.",
                'erreurs' => $validator->errors()->all()
            ]);
        }
        
        /**
         * Initialisation de la transaction
         */
        try {
            //Récupération des données
            $user = Auth::user();
            $montant = Montant::find($request->montant)->libelle_montant;

            if ($user->celpay->solde >= $montant) {
                //Insertion dans la table 'cinetpay_transactions'
                CelpayTransaction::create([
                    'expediteur' => $user->identifiant,
                    'beneficiaire' => $request->beneficiaire,
                    'montant' => $montant,
                ]);
                
                //MAJ du solde CelPay de l'expéditeur
                $celpay_expediteur = CelPay::where('identifiant', $user->identifiant)->first();
                $celpay_expediteur->solde = $celpay_expediteur->solde - $montant;
                $celpay_expediteur->updated_at = DB::raw('NOW()');
                $celpay_expediteur->save();

                //MAJ du solde CelPay du bénéficiaire
                $celpay_destinataire = CelPay::where('identifiant', $request->beneficiaire)->first();
                $celpay_destinataire->solde = $celpay_destinataire->solde + $montant;
                $celpay_destinataire->updated_at = DB::raw('NOW()');
                $celpay_destinataire->save();
    
                //On retourne un message de succès
                return response()->json([
                    "res" => 0,
                    "message" => "Le transfert a été effectué avec succès.",
                ]);
            }

            //On retourne un message d'échec
            return response()->json([
                "res" => 1,
                "message" => "Votre solde est insuffisant pour effectuer cette opération.",
            ]);

        } catch (\Exception $ex) {
            //On retourne un message d'erreur
            return response()->json([
                'message' => 'Nous corrigeons une erreur qui a interrompu le traitement de votre demande. Veuillez réessayer plus tard.'
            ], 400);
        }
    }
}
