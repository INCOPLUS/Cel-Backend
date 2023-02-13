<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Utilisateur extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //Table associé au modèle
    protected $table = 'utilisateurs';

    //Clé primaire associée à la table
    protected $primaryKey = 'identifiant';

    //Clé non AUTO-INCREMENT
    public $incrementing = false;

    //La clé primaire est VARCHAR
    protected $keyType = 'string';

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
     * Obtenir l'administrateur associé à l'utilisateur
    */
    public function administrateur()
    {
        return $this->hasOne(Administrateur::class, 'identifiant');
    }

    /**
     * Obtenir l'élève associé à l'utilisateur
    */
    public function eleve()
    {
        return $this->hasOne(Eleve::class, 'identifiant');
    }

    /**
     * Obtenir l'enseignant associé à l'utilisateur
    */
    public function enseignant()
    {
        return $this->hasOne(Enseignant::class, 'identifiant');
    }

    /**
     * Obtenir le parent associé à l'utilisateur
    */
    public function parent()
    {
        return $this->hasOne(Parents::class, 'identifiant');
    }

    /**
     * Obtenir le compte CELPAY associé à l'utilisateur
    */
    public function celpay()
    {
        return $this->hasOne(CelPay::class, 'identifiant');
    }

    /**
     * Obtenir le pays associé à l'utilisateur
    */
    public function pays()
    {
        return $this->hasOne(Pays::class, 'id_pays', 'id_pays');
    }

    /**
     * Obtenir la ville associée à l'utilisateur
    */
    public function ville()
    {
        return $this->hasOne(Ville::class, 'id_ville', 'id_ville');
    }

    /**
     * Obtenir les transactions CinetPay de l'utilisateur
    */
    public function cinetpay_transactions()
    {
        return $this->hasMany(CinetPayTransaction::class, 'identifiant', 'identifiant');
    }

    /**
     * Obtenir les transactions CinetPay (succès) de l'utilisateur
    */
    public function cinetpay_succes()
    {
        return $this->hasMany(CinetPaySuccess::class, 'identifiant', 'identifiant');
    }

    /**
     * Obtenir les transactions (expediteur) CelPay de l'utilisateur
    */
    public function celpay_expediteur_transactions()
    {
        return $this->hasMany(CelpayTransaction::class, 'expediteur', 'identifiant');
    }

    /**
     * Obtenir les transactions (beneficiaire) CelPay de l'utilisateur
    */
    public function celpay_beneficiaire_transactions()
    {
        return $this->hasMany(CelpayTransaction::class, 'beneficiaire', 'identifiant');
    }

    
    /**
     * Obtenir le panier de l'utilisateur
    */
    public function paniers()
    {
        return $this->hasMany(Panier::class, 'identifiant', 'identifiant');
    }
}
