<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousExercice extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'sous_exercices';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_sous_exercice';

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
     * Obtenir le sujet associé au sous-exercice
    */
    public function sujet()
    {
        return $this->hasOne(Sujet::class, 'id_sujet', 'id_sujet');
    }

    /**
     * Obtenir l'exercice associé au sous-exercice
    */
    public function exercice()
    {
        return $this->hasOne(Exercice::class, 'id_exercice', 'id_exercice');
    }

    /**
     * Obtenir les questions associées au sous-exercice
    */
    public function questions()
    {
        return $this->hasMany(Question::class, 'id_sous_exercice', 'id_sous_exercice');
    }
}
