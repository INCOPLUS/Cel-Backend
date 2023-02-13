<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    //use HasFactory;

    //Table associé au modèle
    protected $table = 'parents';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_parent';

    //On indique si le modèle doit être 'timestamped'
    public $timestamps = false;

    //Champ(s) du modèle qu'on ne doit pas modifier
    protected $guarded = [];


    /**
     * Obtenir l'utilisateur associé à l'enseignant
    */
    public function utilisateur()
    {
        return $this->hasOne(Utilisateur::class, 'identifiant', 'identifiant');
    }
}
