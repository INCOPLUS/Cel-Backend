<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SujetEleve extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'sujets_eleves';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_sujet_eleve';

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
     * Obtenir l'élève associé au sujet
    */
    public function eleve()
    {
        return $this->hasOne(Eleve::class, 'identifiant', 'identifiant');
    }

    /**
     * Obtenir le sujet associé à l'élève
    */
    public function sujet()
    {
        return $this->hasOne(Sujet::class, 'id_sujet', 'id_sujet');
    }
}
