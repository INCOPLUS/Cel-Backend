<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'chapitres';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_chapitre';

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
     * Obtenir la matière associé au chapitre
    */
    public function matiere()
    {
        return $this->hasOne(Matiere::class, 'id_matiere', 'id_matiere');
    }

    /**
     * Obtenir le niveau associé au chapitre
    */
    public function niveau()
    {
        return $this->hasOne(Niveau::class, 'id_niveau', 'id_niveau');
    }
}
