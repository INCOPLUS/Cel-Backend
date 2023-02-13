<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinetPay extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'cinetpay';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_cinetpay';

    //On indique si le modèle doit être 'timestamped'
    public $timestamps = false;

    //Champ(s) du modèle qu'on ne doit pas modifier
    protected $guarded = [];
}
