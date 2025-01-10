<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = [
        'id_barbers',
         'mission_title',
         'mission_description',
         'mission_image',
         'person_name',
         'mission_realisation_date',   
    ];
}
