<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule_medecin',
        'nom_medecin',
        'grade_medecin',
        'fonction_medecin',
    ];
}
