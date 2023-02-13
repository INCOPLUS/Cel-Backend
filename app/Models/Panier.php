<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'panier';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_panier';

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
     * Obtenir le sujet associé au panier
    */
    public function sujet()
    {
        return $this->hasOne(Sujet::class, 'id_sujet', 'id_sujet');
    }
}
