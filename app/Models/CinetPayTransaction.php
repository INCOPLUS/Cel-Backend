<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinetPayTransaction extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'cinetpay_transactions';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_cinetrans';

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
     * Obtenir l'utilisateur associé à la transaction
    */
    public function utilisateur()
    {
        return $this->hasOne(Utilisateur::class, 'identifiant', 'identifiant');
    }
}
