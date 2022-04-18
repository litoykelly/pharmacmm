<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appro extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicament_id',
        'fournisseur_id',
        'num_lot',
        'qty_ee',
        'date_exp',
        'date_appro',
    ];

   
}
