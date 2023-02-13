<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'sujets';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_sujet';

    //On indique si le modèle doit être 'timestamped'
    public $timestamps = false;

    //Champ(s) du modèle qu'on ne doit pas modifier
    protected $guarded = [];


    /*
    |
    |--------------------------------------------------------------------------
    | DEFINITION DES RELATIONS AUTOUR DU MODEL
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Obtenir l'enseignant associé au sujet
    */
    public function enseignant()
    {
        return $this->hasOne(Enseignant::class, 'identifiant', 'identifiant');
    }

    /**
     * Obtenir le type de sujet associé au sujet
    */
    public function type_sujet()
    {
        return $this->hasOne(TypeSujet::class, 'id_typesujet', 'id_typesujet');
    }

    /**
     * Obtenir le niveau associé au sujet
    */
    public function niveau()
    {
        return $this->hasOne(Niveau::class, 'id_niveau', 'id_niveau');
    }

    /**
     * Obtenir la série associée au sujet
    */
    public function serie()
    {
        return $this->hasOne(Serie::class, 'id_serie', 'id_serie');
    }

    /**
     * Obtenir la matière associée au sujet
    */
    public function matiere()
    {
        return $this->hasOne(Matiere::class, 'id_matiere', 'id_matiere');
    }

    /**
     * Obtenir le chapitre associé au sujet
    */
    public function chapitre()
    {
        return $this->hasOne(Chapitre::class, 'id_chapitre', 'id_chapitre');
    }

    /**
     * Obtenir la leçon associée au sujet
    */
    public function lecon()
    {
        return $this->hasOne(Lecon::class, 'id_lecon', 'id_lecon');
    }

    /**
     * Obtenir les exercices associés au sujet
    */
    public function exercices()
    {
        return $this->hasMany(Exercice::class, 'id_sujet', 'id_sujet');
    }

    /**
     * Obtenir les sous-exercices associés au sujet
    */
    public function sous_exercices()
    {
        return $this->hasMany(SousExercice::class, 'id_sujet', 'id_sujet');
    }

    /**
     * Obtenir les questions associées au sujet
    */
    public function questions()
    {
        return $this->hasMany(Question::class, 'id_sujet', 'id_sujet');
    }

    /**
     * Obtenir les élèves associés au sujet
    */
    public function sujets_eleves()
    {
        return $this->hasMany(SujetEleve::class, 'id_sujet', 'id_sujet');
    }
}
