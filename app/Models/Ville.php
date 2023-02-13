<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'villes';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_ville';

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
     * Obtenir le pays associé à la ville
    */
    public function pays()
    {
        return $this->hasOne(Pays::class, 'id_pays', 'id_pays');
    }
}
