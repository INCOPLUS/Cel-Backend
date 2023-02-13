<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Lecon;
use App\Models\Serie;
use App\Models\Ville;
use App\Models\Niveau;
use App\Models\Matiere;
use App\Models\Chapitre;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParametreController extends Controller
{
    /**
     * Affichage des niveaux en fonction du type d'enseignement
     */
    public function niveaux($id_enseignement)
    {
        return Niveau::where('id_enseignement', $id_enseignement)->where('top_actif', 0)->get();
    }

    /**
     * Affichage des matières en fonction du type d'enseignement
     */
    public function matieres($id_enseignement)
    {
        // return Matiere::where('id_enseignement', $id_enseignement)->where('top_actif', 0)->orderBy('libelle')->get();

        return Matiere::where('top_actif', 0)->where(function ($query) use ($id_enseignement) {
            $query->where('top_primaire', $id_enseignement)
                  ->orWhere('top_secondaire', $id_enseignement)
                  ->orWhere('top_superieur', $id_enseignement);
        })->orderBy('libelle')->get(['id_matiere', 'libelle']);
    }

    /**
     * Affichage des villes en fonction du pays
     */
    public function villes($id_pays)
    {
        return Ville::where('id_pays', $id_pays)->where('top_actif', 0)->orderBy('nom_ville')->get(['id_ville', 'nom_ville']);
    }

    /**
     * Affichage des chapitres en fonction du niveau et de la matière
     */
    public function chapitres($id_niveau, $id_matiere)
    {
        return Chapitre::where('id_niveau', $id_niveau)->where('id_matiere', $id_matiere)->where('top_actif', 0)->orderBy('libelle')->get(['id_chapitre', 'libelle']);
    }

    /**
     * Affichage des leçons en fonction du chapitre
     */
    public function lecons($id_chapitre)
    {
        return Lecon::where('id_chapitre', $id_chapitre)->where('top_actif', 0)->orderBy('libelle')->get(['id_lecon', 'libelle']);
    }

    /**
     * Affichage des séries en fonction du niveau
     */
    public function series($id_niveau)
    {
        return Serie::where('top_actif', 0)->where(function ($query) use ($id_niveau) {
            $query->where('top_seconde', $id_niveau)
                  ->orWhere('top_premiere', $id_niveau)
                  ->orWhere('top_terminale', $id_niveau);
        })->orderBy('libelle')->get(['id_serie', 'libelle']);
    }

    /**
     * Affichage des utilisateurs en fonction du statut
     */
    public function beneficiaires($top_user)
    {
        return Utilisateur::where('top_user', $top_user)->where('identifiant', '!=', Auth::user()->identifiant)->where('top_actif', 0)->orderBy('nom_prenom')->get(['identifiant', 'nom_prenom']);
    }
}
