<?php

namespace App\Http\Controllers\Backend\Eleve;

use App\Models\Sujet;
use App\Models\CelPay;
use App\Models\Erreur;
use App\Models\Panier;
use App\Models\AchatSujet;
use App\Models\SujetEleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SujetController extends Controller
{
    /**
     * Ajout d'un sujet au panier
     */
    public function ajout_panier($id_sujet)
    {
        if (Auth::check()) {
            //Insertion dans la table panier
            Panier::firstOrCreate([
                'identifiant' => Auth::user()->identifiant,
                'id_sujet' => $id_sujet,
            ]);
    
            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "Le sujet a été ajouté à votre panier.",
            ]);
        }

        //On retourne un message d'erreur
        return response()->json([
            'res' => 1,
            'message' => "Votre session a expiré. Veuillez vous reconnecter.",
        ]);
    }

    /**
     * Retrait d'un sujet du panier
     */
    public function retrait_panier($id_sujet)
    {
        if (Auth::check()) {
            //Suppression éventuelle du sujet du panier
            Panier::where('identifiant', Auth::user()->identifiant)->where('id_sujet', $id_sujet)->delete();
    
            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "Le sujet a été retiré du panier.",
            ]);
        }

        //On retourne un message d'erreur
        return response()->json([
            'res' => 1,
            'message' => "Votre session a expiré. Veuillez vous reconnecter.",
        ]);
    }

    /**
     * Vider les sujets d'un panier
     */
    public function vider_panier()
    {
        if (Auth::check()) {
            //Suppression éventuelle des sujets du panier
            Panier::where('identifiant', Auth::user()->identifiant)->delete();
    
            //On retourne un message de succès
            return response()->json([
                'res' => 0,
                'message' => "Votre panier a été vidé avec succès.",
            ]);
        }

        //On retourne un message d'erreur
        return response()->json([
            'res' => 1,
            'message' => "Votre session a expiré. Veuillez vous reconnecter.",
        ]);
    }

    /**
     * Achat d'un sujet
     */
    public function achat_sujet($id_sujet)
    {
        if (Auth::check()) {
            //Répération de l'utilisateur connecté
            $user = Auth::user();

            //Récupération des infos du sujet
            $sujet = Sujet::where('id_sujet', $id_sujet)->where('top_actif', 1)->first();
            if ($sujet) {
                //Vérification du solde >= montant
                if ($user->celpay->solde >= $sujet->type_sujet->montant) {
                    
                    //Insertion dans la table 'achat_sujets'
                    AchatSujet::create([
                        'id_sujet' => $id_sujet,
                        'identifiant' => $user->identifiant,
                        'montant' => $sujet->type_sujet->montant,
                        'pourcentage' => $sujet->type_sujet->pourcentage,
                    ]);

                    //Insertion dans la table 'sujets_eleves'
                    SujetEleve::create([
                        'id_sujet' => $id_sujet,
                        'identifiant' => $user->identifiant,
                    ]);


                    //MAJ du solde de l'élève (- montant)
                    $celpay_eleve = CelPay::where('identifiant', $user->identifiant)->first();
                    $celpay_eleve->solde = $celpay_eleve->solde - $sujet->type_sujet->montant;
                    $celpay_eleve->updated_at = DB::raw('NOW()');
                    $celpay_eleve->save();
        
                    //Calcul de la ristourne de l'enseignant
                    $ristourne = ($sujet->type_sujet->montant * $sujet->type_sujet->pourcentage) / 100;
    
                    //MAJ du solde de l'enseignant (+ ristourne)
                    $celpay_enseignant = CelPay::where('identifiant', $sujet->identifiant)->first();
                    $celpay_enseignant->solde = $celpay_enseignant->solde + $ristourne;
                    $celpay_enseignant->updated_at = DB::raw('NOW()');
                    $celpay_enseignant->save();

                    //Suppression éventuelle du sujet du panier
                    Panier::where('identifiant', $user->identifiant)->where('id_sujet', $id_sujet)->delete();
    
                    //On retourne un message de succès
                    return response()->json([
                        'res' => 0,
                        'message' => "Votre achat a été effectué avec succès.",
                    ]);
                }
                
                //On retourne un message d'erreur
                return response()->json([
                    'res' => 1,
                    'message' => "Votre solde est insuffisant pour acheter ce sujet.",
                ]);
            }

            //On retourne un message d'erreur
            return response()->json([
                'res' => 1,
                'message' => "Ce sujet n'est plus disponible. Veuillez choisir un autre.",
            ]);
        }

        //On retourne un message d'erreur
        return response()->json([
            'res' => 1,
            'message' => "Votre session a expiré. Veuillez vous reconnecter.",
        ]);
    }

    /**
     * Achat de tous les sujets d'un panier
     */
    public function achat_panier()
    {
        if (Auth::check()) {
            //Répération de l'utilisateur connecté
            $user = Auth::user();

            //Récupération des sujets au panier
            $paniers = Panier::where('identifiant', $user->identifiant)->get();
            if ($paniers->count() >= 1) {
                //Vérification du solde >= montant
                if ($user->celpay->solde >= get_montant_panier($paniers)) {

                    foreach ($paniers as $panier) {
                        //Insertion dans la table 'achat_sujets'
                        AchatSujet::create([
                            'id_sujet' => $panier->sujet->id_sujet,
                            'identifiant' => $user->identifiant,
                            'montant' => $panier->sujet->type_sujet->montant,
                            'pourcentage' => $panier->sujet->type_sujet->pourcentage,
                        ]);

                        //Insertion dans la table 'sujets_eleves'
                        SujetEleve::create([
                            'id_sujet' => $panier->sujet->id_sujet,
                            'identifiant' => $user->identifiant,
                        ]);
                        
                        //Calcul de la ristourne de l'enseignant
                        $ristourne = ($panier->sujet->type_sujet->montant * $panier->sujet->type_sujet->pourcentage) / 100;
                        
                        //MAJ du solde de l'enseignant (+ ristourne)
                        $celpay_enseignant = CelPay::where('identifiant', $panier->sujet->identifiant)->first();
                        $celpay_enseignant->solde = $celpay_enseignant->solde + $ristourne;
                        $celpay_enseignant->updated_at = DB::raw('NOW()');
                        $celpay_enseignant->save();
                    }

                    //MAJ du solde de l'élève (- montant)
                    $celpay_eleve = CelPay::where('identifiant', $user->identifiant)->first();
                    $celpay_eleve->solde = $celpay_eleve->solde - get_montant_panier($paniers);
                    $celpay_eleve->updated_at = DB::raw('NOW()');
                    $celpay_eleve->save();

                    //Suppression éventuelle du panier
                    Panier::where('identifiant', $user->identifiant)->delete();
    
                    //On retourne un message de succès
                    return response()->json([
                        'res' => 0,
                        'message' => "Votre achat a été effectué avec succès.",
                    ]);
                }

                //On retourne un message d'erreur
                return response()->json([
                    'res' => 1,
                    'message' => "Votre solde est insuffisant pour effectuer cet achat.",
                ]);
            }
    
            //On retourne un message de succès
            return response()->json([
                'res' => 1,
                'message' => "Vous n'avez aucun sujet dans votre panier.",
            ]);
        }

        //On retourne un message d'erreur
        return response()->json([
            'res' => 1,
            'message' => "Votre session a expiré. Veuillez vous reconnecter.",
        ]);


    }
}
