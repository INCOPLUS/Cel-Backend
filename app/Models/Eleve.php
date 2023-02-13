<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    //use HasFactory;

    //Table associé au modèle
    protected $table = 'eleves';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_eleve';

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
     * Obtenir l'utilisateur associé à l'élève
    */
    public function utilisateur()
    {
        return $this->hasOne(Utilisateur::class, 'identifiant', 'identifiant');
    }

    /**
     * Obtenir les sujets associés à l'élève
    */
    public function sujets()
    {
        return $this->hasMany(SujetEleve::class, 'identifiant', 'identifiant');
    }

    /**
     * Obtenir le niveau associé à l'élève
    */
    public function niveau()
    {
        return $this->hasOne(Niveau::class, 'id_niveau', 'id_niveau');
    }
}
