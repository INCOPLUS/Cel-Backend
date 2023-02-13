<?php

namespace App\Http\Controllers\Backend\Eleve;

use App\Models\Sujet;
use App\Models\Niveau;
use App\Models\Panier;
use App\Models\Matiere;
use App\Models\Montant;
use App\Models\TypeSujet;
use App\Models\SujetEleve;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ViewEleveController extends Controller
{
    /**
     * Page d'accueil
     */
    public function index()
    {
        //Récupération des données
        $user = Auth::user();
        $pourcentage_profil = 25;
        $compo_effectues = DB::table('sujets_eleves')
                                ->join('composition', 'sujets_eleves.id_sujet_eleve', '=', 'composition.id_sujet_eleve')
                                ->select('note_sur_20', 'top_resultat')
                                ->where('sujets_eleves.identifiant', $user->identifiant)
                                ->get();

        //On retourne la vue avec les données
        return view('backend/eleve/accueil', compact('user', 'pourcentage_profil', 'compo_effectues'));
    }

    /**
     * Sujets mis en ligne
     */
    public function sujets()
    {
        //Récupération des données
        $user = Auth::user();
        $sujets = Sujet::where('top_actif', 1)->orderBy('date_mel', 'desc')->get();
        $typesujets = TypeSujet::where('top_actif', 0)->get();
        $niveaux = Niveau::where('id_enseignement', $user->eleve->id_enseignement)->where('top_actif', 0)->get();
        $matieres = Matiere::where('top_actif', 0)->where(function ($query) use ($user) { $query->where('top_primaire', $user->eleve->id_enseignement)->orWhere('top_secondaire', $user->eleve->id_enseignement)->orWhere('top_superieur', $user->eleve->id_enseignement);})->orderBy('libelle')->get(['id_matiere', 'libelle']);

        //On retourne la vue avec les données
        return view('backend/eleve/sujets', compact('user', 'sujets', 'typesujets', 'niveaux', 'matieres'));
    }

    /**
     * Panier de l'élève
     */
    public function panier()
    {
        //Récupération des données
        $user = Auth::user();
        $panier = Panier::where('identifiant', $user->identifiant)->orderBy('created_at', 'desc')->get();
        $montant_panier = money_format(get_montant_panier($panier));

        //On retourne la vue avec les données
        return view('backend/eleve/panier', compact('user', 'panier', 'montant_panier'));
    }

    /**
     * Historique des compos
     */
    public function compo()
    {
        //Récupération des données
        $user = Auth::user();
        $sujets_eleves = SujetEleve::where('identifiant', $user->identifiant)->where('top_compo', '!=', 2)->get();

        //On retourne la vue avec les données
        return view('backend/eleve/compo', compact('user', 'sujets_eleves'));
    }

    /**
     * Composition
     */
    public function composition($id)
    {
        //Récupération des données
        $user = Auth::user();
        $sujet_eleve = SujetEleve::where('id_sujet_eleve', $id)->where('top_compo', '!=', 2)->first();
        $sujet = $sujet_eleve->sujet ?? "";

        //On retourne la vue avec les données
        if ($sujet_eleve && $sujet_eleve->identifiant == $user->identifiant) {
            return view('backend/eleve/composition', compact('user', 'sujet', 'sujet_eleve'));
        }
    }

    /**
     * Examens
     */
    public function examen()
    {
        return view('backend/eleve/examen');
    }

    /**
     * Distinctions
     */
    public function distinction()
    {
        return view('backend/eleve/distinction');
    }

    /**
     * Documents
     */
    public function document()
    {
        return view('backend/eleve/document');
    }

    /**
     * Compte CELPAY
     */
    public function compte_celpay()
    {
        //Récupération des données
        $user = Auth::user();
        $montant_recharges = Montant::where('top_recharge', 1)->orderBy('libelle_montant')->get();
        $montant_transferts = Montant::where('top_transfert', 1)->orderBy('libelle_montant')->get();

        //On retourne la vue avec les données
        return view('backend/eleve/compte_celpay', compact('user', 'montant_recharges', 'montant_transferts'));
    }

    /**
     * Celchat
     */
    public function celchat()
    {
        return view('backend/eleve/celchat');
    }

    /**
     * Faire une demande
     */
    public function faire_demande()
    {
        return view('backend/eleve/faire_demande');
    }


}
