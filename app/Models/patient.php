<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_fiche',
        'cat_patient',
        'societe_id',
        'nom_patient',
        'age_patient',
        'sexe_patient'
    ];

}
