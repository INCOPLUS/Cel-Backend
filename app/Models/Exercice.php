<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'exercices';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_exercice';

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
     * Obtenir le sujet associé à l'exercice
    */
    public function sujet()
    {
        return $this->hasOne(Sujet::class, 'id_sujet', 'id_sujet');
    }

    /**
     * Obtenir les sous-exercices associés à l'exercice
    */
    public function sous_exercices()
    {
        return $this->hasMany(SousExercice::class, 'id_exercice', 'id_exercice');
    }

    /**
     * Obtenir les questions associées à l'exercice
    */
    public function questions()
    {
        return $this->hasMany(Question::class, 'id_exercice', 'id_exercice');
    }
}
