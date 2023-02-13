<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'questions';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_question';

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
     * Obtenir le sujet associé à la question
    */
    public function sujet()
    {
        return $this->hasOne(Sujet::class, 'id_sujet', 'id_sujet');
    }

    /**
     * Obtenir l'exercice associé à la question
    */
    public function exercice()
    {
        return $this->hasOne(Exercice::class, 'id_exercice', 'id_exercice');
    }

    /**
     * Obtenir le sous-exercice associé à la question
    */
    public function sous_exercice()
    {
        return $this->hasOne(SousExercice::class, 'id_sous_exercice', 'id_sous_exercice');
    }
}
