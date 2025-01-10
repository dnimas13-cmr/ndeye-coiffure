<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = [
        'id_babers',
         'id_recruiters',
         'service_adress',
         'location_distance', 
         'start_time', 
         'end_time', 
         'service_price', 
         'kills_wanted',    
    ];
}
