<?php

namespace App\Http\Controllers\Backend\Administrateur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chapitre;
use App\Models\Eleve;
use App\Models\Enseignant;
use App\Models\Enseignement;
use App\Models\Lecon;
use App\Models\Matiere;
use App\Models\Mention;
use App\Models\Montant;
use App\Models\Niveau;
use App\Models\Parents;
use App\Models\Pays;
use App\Models\Serie;
use App\Models\Sujet;
use App\Models\TypeSujet;
use App\Models\Ville;
use Illuminate\Support\Facades\Auth;

class ViewAdminController extends Controller
{
    /**
     * Page d'accueil de l'admistrateur
     */
    public function index()
    {
        //Récupération des données
        $user = Auth::user();
        $enseignants = Enseignant::count();
        $eleves = Eleve::count();
        $parents = Parents::count();
        $sujets = Sujet::where('top_actif', 1)->count();

        //On retourne la vue avec les données
        return view('backend/admin/accueil', compact('user', 'enseignants', 'eleves', 'parents', 'sujets'));
    }

    /**
     * Gestion du site
     */
    public function gestion_site()
    {
        return view('backend/admin/gestion_site');
    }

    /**
     * Gestion des sujets
     */
    public function gestion_sujet()
    {
        return view('backend/admin/gestion_sujet');
    }

    /**
     * Paramètres des sujets
     */
    public function parametre_sujet()
    {
        //Récupération des données
        $user = Auth::user();
        $enseignements = Enseignement::all();

        //On retourne la vue avec les données
        return view('backend/admin/parametre_sujet', compact('user', 'enseignements'));
    }

    /**
     * Parametrages
     */
    public function parametrage()
    {
        //Récupération des données
        $user = Auth::user();
        $enseignements = Enseignement::all();
        $niveaux = Niveau::all();
        $typesujets = TypeSujet::all();
        $matieres = Matiere::all();
        $chapitres = Chapitre::all();
        $lecons = Lecon::all();
        $series = Serie::all();
        $mentions = Mention::all();
        $montants = Montant::all();
        $pays = Pays::all();
        $villes = Ville::all();

        //On retourne la vue avec les données
        return view('backend/admin/parametrages', compact('user', 'enseignements', 'niveaux', 'typesujets', 'matieres', 'chapitres', 'lecons', 'series', 'mentions', 'montants', 'pays', 'villes'));
    }

    /**
     * Gestion des examens
     */
    public function gestion_examen()
    {
        return view('backend/admin/gestion_examen');
    }

    /**
     * Gestion des oraux
     */
    public function gestion_oral()
    {
        return view('backend/admin/gestion_oral');
    }

    /**
     * Gestion des cours
     */
    public function gestion_cours()
    {
        return view('backend/admin/gestion_cours');
    }

    /**
     * Liste des enseignants
     */
    public function liste_enseignants()
    {
        $enseignants = Enseignant::all();
        return view('backend/admin/liste_enseignants', compact('enseignants'));
    }

    /**
     * Liste des élèves
     */
    public function liste_eleves()
    {
        $eleves = Eleve::all();
        return view('backend/admin/liste_eleves', compact('eleves'));
    }

    /**
     * Liste des parents
     */
    public function liste_parents()
    {
        $parents = Parents::all();
        return view('backend/admin/liste_parents', compact('parents'));
    }

    /**
     * Emploi du temps
     */
    public function emploi_temps()
    {
        return view('backend/admin/emploi_temps');
    }

    /**
     * Compte CELPAY
     */
    public function compte_celpay()
    {
        return view('backend/admin/compte_celpay');
    }

    /**
     * Tutoriels
     */
    public function tutoriel()
    {
        return view('backend/admin/tutoriel');
    }

    /**
     * Celchat
     */
    public function celchat()
    {
        return view('backend/admin/celchat');
    }

    /**
     * Banquet des sujets
     */
    public function banquet_sujet()
    {
        return view('backend/admin/banquet_sujet');
    }

    /**
     * Détail candidat examen
     */
    public function detail_candidat_examen()
    {
        return view('backend/admin/detail_candidat_examen');
    }










    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
