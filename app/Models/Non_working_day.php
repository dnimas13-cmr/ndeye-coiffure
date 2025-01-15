<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Non_working_days extends Model
{
    protected $fillable = [
        'id_barbers',
         'specific_days',
         'reason',   
    ];
}
