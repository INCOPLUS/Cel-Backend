<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Enseignement;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /**
     * Page d'accueil de l'application
     */
    public function index()
    {
        return view('frontend/accueil');
    }

    /**
     * A Propos
     */
    public function about()
    {
        return view('frontend/about');
    }

    /**
     * Blogs
     */
    public function blogs()
    {
        return view('frontend/blogs');
    }

    /**
     * Contact
     */
    public function contact()
    {
        return view('frontend/contact');
    }

    /**
     * Inscription
     */
    public function inscription()
    {
        $enseignements = Enseignement::all();
        return view('frontend/inscription', compact('enseignements'));
    }

    /**
     * Connexion
     */
    public function connexion()
    {
        return view('frontend/connexion');
    }

    /**
     * Connexion
     */
    public function connexion_admin()
    {
        return view('frontend/connexion_admin');
    }

    /**
     * Mot de passe oublié
     */
    public function mdp_oublie()
    {
        return view('frontend/mdp_oublie');
    }

    /**
     * Enseignement
     */
    public function enseignement()
    {
        return view('frontend/enseignement');
    }

    /**
     * Composition
     */
    public function composition()
    {
        return view('frontend/composition');
    }

    /**
     * Annonces publicitaires
     */
    public function annonce_pub()
    {
        return view('frontend/annonce_pub');
    }

    /**
     * Detail d'un blog
     */
    public function detail_blog()
    {
        return view('frontend/detail_blog');
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
