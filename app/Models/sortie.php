<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sortie extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'prescription_id',
        'id_med_sous',
        'qty_med_presc',
        'qty_sortie',
        'date_sortie',
    ];

}
