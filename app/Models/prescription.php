<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_fiche',
        'patient_id',
        'matricule_medecin',
        'medicament_id',
        'service',
        'qty_med_presc',
        'date_prescr',
        'statut'
    ];

}
