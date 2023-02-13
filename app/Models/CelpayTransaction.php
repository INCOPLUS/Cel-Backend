<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CelpayTransaction extends Model
{
    //use HasFactory;

    //Table associé au modèle
    protected $table = 'celpay_transactions';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_transaction';

    //On indique si le modèle doit être 'timestamped'
    public $timestamps = false;

    //Champ(s) du modèle qu'on ne doit pas modifier
    protected $guarded = [];
}
