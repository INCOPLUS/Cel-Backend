<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePiece extends Model
{
    use HasFactory;

    //Table associé au modèle
    protected $table = 'type_piece';

    //Clé primaire associée à la table
    protected $primaryKey = 'id_typepiece';

    //On indique si le modèle doit être 'timestamped'
    public $timestamps = false;

    //Champ(s) du modèle qu'on ne doit pas modifier
    protected $guarded = [];
}
