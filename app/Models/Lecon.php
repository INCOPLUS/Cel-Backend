<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecon extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'lecons';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_lecon';

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
     * Obtenir le chapitre associé à la leçon
    */
    public function chapitre()
    {
        return $this->hasOne(Chapitre::class, 'id_chapitre', 'id_chapitre');
    }
}
