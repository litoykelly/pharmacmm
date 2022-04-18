<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie',
        'nom_fourni',
        'adresse_fourni',
        'tel_fourni'
    ];

}
