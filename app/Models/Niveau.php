<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    //use HasFactory;

    //Table associé au modèle
    protected $table = 'niveaux';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_niveau';

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
     * Obtenir l'enseignement associé au niveau
    */
    public function enseignement()
    {
        return $this->hasOne(Enseignement::class, 'id_enseignement', 'id_enseignement');
    }
}
