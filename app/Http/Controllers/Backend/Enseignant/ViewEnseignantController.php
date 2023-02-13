<?php

namespace App\Http\Controllers\Backend\Enseignant;

use App\Models\Pays;
use App\Models\Serie;
use App\Models\Sujet;
use App\Models\Ville;
use App\Models\Niveau;
use App\Models\Matiere;
use App\Models\Montant;
use App\Models\Chapitre;
use App\Models\TypePiece;
use App\Models\TypeSujet;
use App\Models\Experience;
use App\Models\Enseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\ParametreController;

class ViewEnseignantController extends Controller
{
    /**
     * Page d'accueil
     */
    public function index()
    {
        //Récupération des données
        $user = Auth::user();
        $pourcentage_profil = 25;
        $pourcentage_profil += $user->enseignant->top_infos_perso == '1' ? 15 : 0;
        $pourcentage_profil += $user->enseignant->top_piece == '1' ? 20 : 0;
        $pourcentage_profil += $user->enseignant->top_cv == '1' ? 20 : 0;
        $pourcentage_profil += $user->enseignant->top_diplome == '1' ? 20 : 0;
        $sujets_traites = DB::table('sujets_eleves')
                                ->join('sujets', 'sujets_eleves.id_sujet', '=', 'sujets.id_sujet')
                                ->where('sujets.identifiant', $user->identifiant)->count();

        //On retourne la vue avec les données
        return view('backend/enseignant/accueil', compact('user', 'pourcentage_profil', 'sujets_traites'));
    }

    /**
     * Gestion des sujets
     */
    public function gestion_sujet()
    {
        //récupération des données
        $user = Auth::user();
        $brouillons = Sujet::where('identifiant', $user->identifiant)->where('top_actif', 0)->orderBy('created_at', 'DESC')->get();
        $devoirs = Sujet::where('identifiant', $user->identifiant)->where('id_typesujet', 1)->where('top_actif', 1)->orderBy('created_at', 'DESC')->get();
        $interrogations = Sujet::where('identifiant', $user->identifiant)->where('id_typesujet', 2)->where('top_actif', 1)->orderBy('created_at', 'DESC')->get();

        //On retourne la vue avec les données
        return view('backend/enseignant/gestion_sujet', compact('user', 'brouillons', 'devoirs', 'interrogations'));
    }

    /**
     * Gestion des oraux
     */
    public function gestion_oral()
    {
        return view('backend/enseignant/gestion_oral');
    }

    /**
     * Gestion des cours
     */
    public function gestion_cours()
    {
        return view('backend/enseignant/gestion_cours');
    }

    /**
     * Emploi du temps
     */
    public function emploi_temps()
    {
        return view('backend/enseignant/emploi_temps');
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
        return view('backend/enseignant/compte_celpay', compact('user', 'montant_recharges', 'montant_transferts'));
    }

    /**
     * Tutoriels
     */
    public function tutoriel()
    {
        return view('backend/enseignant/tutoriel');
    }

    /**
     * Celchat
     */
    public function celchat()
    {
        return view('backend/enseignant/celchat');
    }

    /**
     * Faire une demande
     */
    public function faire_demande()
    {
        return view('backend/enseignant/faire_demande');
    }

    /**
     * Notifications
     */
    public function notifications()
    {
        return view('backend/enseignant/notifications');
    }

    /**
     * Profil
     */
    public function profil()
    {
        return view('backend/enseignant/profil');
    }

    /**
     * Mis à jour du Profil
     */
    public function update_profil()
    {
        //récupération des données
        $user = Auth::user();
        $typepieces = TypePiece::where('top_actif', 0)->get();
        $experiences = Experience::where('top_actif', 0)->get();
        $enseignements = Enseignement::where('top_actif', 0)->get();
        $pays = Pays::where('top_actif', 0)->orderBy('nom_pays')->get();
        $villes = Ville::where('id_pays', $user->id_pays)->where('top_actif', 0)->orderBy('nom_ville')->get();
        $matieres = Matiere::where('top_actif', 0)->where(function ($query) use ($user) { $query->where('top_primaire', $user->enseignant->id_enseignement)->orWhere('top_secondaire', $user->enseignant->id_enseignement)->orWhere('top_superieur', $user->enseignant->id_enseignement);})->orderBy('libelle')->get(['id_matiere', 'libelle']);

        //On retourne la vue avec les données
        return view('backend/enseignant/update_profil', compact('user', 'enseignements', 'experiences', 'matieres', 'typepieces', 'pays', 'villes'));
    }

    /**
     * Mis à jour du mot de passe
     */
    public function update_mdp()
    {
        return view('backend/enseignant/update_mdp');
    }

    /**
     * Ajout d'un nouveau sujet
     */
    public function ajout_sujet()
    {
        //récupération des données
        $user = Auth::user();
        $typesujets = TypeSujet::where('top_actif', 0)->get();
        $niveaux = Niveau::where('id_enseignement', $user->enseignant->id_enseignement)->where('top_actif', 0)->get();
        $matieres = Matiere::where('top_actif', 0)->where(function ($query) use ($user) { $query->where('top_primaire', $user->enseignant->id_enseignement)->orWhere('top_secondaire', $user->enseignant->id_enseignement)->orWhere('top_superieur', $user->enseignant->id_enseignement);})->orderBy('libelle')->get(['id_matiere', 'libelle']);

        //On retourne la vue avec les données
        return view('backend/enseignant/ajout_sujet', compact('user', 'typesujets', 'niveaux', 'matieres'));
    }
    public function ajout_sujet_2()
    {
        return view('backend/enseignant/ajout_sujet_2');
    }

    /**
     * Prévisualiser un sujet
     */
    public function previsualiser_sujet($id_sujet)
    {
        //Récupération des données
        $sujet = Sujet::find($id_sujet);

        return view('backend/enseignant/preview_sujet', compact('sujet'));
    }

    /**
     * Prévisualiser un sujet
     */
    public function modifier_sujet($id_sujet)
    {
        //Récupération des données
        $user = Auth::user();
        $sujet = Sujet::find($id_sujet);
        $texte_sujet = $sujet->texte_sujet;
        $typesujets = TypeSujet::where('top_actif', 0)->get();
        $niveaux = Niveau::where('id_enseignement', $user->enseignant->id_enseignement)->where('top_actif', 0)->get();
        $matieres = Matiere::where('top_actif', 0)->where(function ($query) use ($user) { $query->where('top_primaire', $user->enseignant->id_enseignement)->orWhere('top_secondaire', $user->enseignant->id_enseignement)->orWhere('top_superieur', $user->enseignant->id_enseignement);})->orderBy('libelle')->get(['id_matiere', 'libelle']);
        $parametres = new ParametreController();
        $chapitres = $parametres->chapitres($sujet->niveau->id_niveau, $sujet->matiere->id_matiere);
        $lecons = $parametres->lecons($sujet->chapitre->id_chapitre);
        $series = $parametres->series($sujet->niveau->id_niveau);
        $index_editor = 1;
        $array_editor = [];
        
        //On retourne la vue avec les données
        if ($user->identifiant == $sujet->identifiant) {
            return view('backend/enseignant/update_sujet', compact('user', 'sujet', 'texte_sujet', 'typesujets', 'niveaux', 'matieres', 'chapitres', 'lecons', 'series', 'index_editor', 'array_editor'));
        }

    }

}
