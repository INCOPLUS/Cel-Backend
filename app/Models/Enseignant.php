<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'enseignants';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_enseignant';

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
     * Obtenir l'utilisateur associé à l'enseignant
    */
    public function utilisateur()
    {
        return $this->hasOne(Utilisateur::class, 'identifiant', 'identifiant');
    }

    /**
     * Obtenir l'enseignement associé à l'enseignant
    */
    public function enseignement()
    {
        return $this->hasOne(Enseignement::class, 'id_enseignement', 'id_enseignement');
    }

    /**
     * Obtenir la matière associé à l'enseignant
    */
    public function matiere()
    {
        return $this->hasOne(Matiere::class, 'id_matiere', 'id_matiere');
    }

    /**
     * Obtenir la pièce associé à l'enseignant
    */
    public function typepiece()
    {
        return $this->hasOne(TypePiece::class, 'id_typepiece', 'id_typepiece');
    }

    /**
     * Obtenir les diplômes associés à l'enseignant
    */
    public function diplomes()
    {
        return $this->hasMany(Diplome::class, 'identifiant', 'identifiant');
    }

    /**
     * Obtenir les sujets associés à l'enseignant
    */
    public function sujets()
    {
        return $this->hasMany(Sujet::class, 'identifiant', 'identifiant');
    }
}
