<?php

namespace App\Http\Controllers\Backend\Parent;

use App\Models\Montant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Eleve;
use Illuminate\Support\Facades\Auth;

class ViewParentController extends Controller
{
    /**
     * Page d'accueil
     */
    public function index()
    {
        //Récupération des données
        $user = Auth::user();
        $pourcentage_profil = 25;
        $enfants_inscrits = Eleve::where('id_parent', $user->identifiant)->count();

        //On retourne la vue avec les données
        return view('backend/parent/accueil', compact('user', 'pourcentage_profil', 'enfants_inscrits'));
    }

    /**
     * Composition
     */
    public function liste_enfant()
    {
        return view('backend/parent/liste_enfant');
    }

    /**
     * Composition
     */
    public function composition()
    {
        return view('backend/parent/composition');
    }

    /**
     * Gestion des comptes
     */
    public function gestion_compte()
    {
        return view('backend/parent/gestion_compte');
    }


    /**
     * Documents
     */
    public function document()
    {
        return view('backend/parent/document');
    }

    /**
     * Compte CelPay
     */
    public function compte_celpay()
    {
        //Récupération des données
        $user = Auth::user();
        $montant_recharges = Montant::where('top_recharge', 1)->orderBy('libelle_montant')->get();
        $montant_transferts = Montant::where('top_transfert', 1)->orderBy('libelle_montant')->get();

        //On retourne la vue avec les données
        return view('backend/parent/compte_celpay', compact('user', 'montant_recharges', 'montant_transferts'));
    }

    /**
     * CelChat
     */
    public function celchat()
    {
        return view('backend/parent/celchat');
    }

    /**
     * Faire une demande
     */
    public function faire_demande()
    {
        return view('backend/parent/faire_demande');
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
