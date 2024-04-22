<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = ['nom', 'prenom', 'classe'];

    public static $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'classe' => 'required',
    ];
}

