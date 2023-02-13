<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'composition';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_composition';

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
     * Obtenir le sujet_eleve associé à la composition
    */
    public function sujet_eleve()
    {
        return $this->hasOne(SujetEleve::class, 'id_sujet_eleve', 'id_sujet_eleve');
    }

    /**
     * Obtenir le sujet_eleve associé à la composition
    */
    public function questions_reponses()
    {
        return $this->hasMany(QuestionReponse::class, 'id_composition', 'id_composition');
    }
}
