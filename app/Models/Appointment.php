<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'id_barbers',
         'hairstyle_name',
         'hairstyle_price',
         'category',
         'realisation_time',
         'type_forfait',
         'type_classic',
         'hairstyle_photos',
         'hairstyle_description',
    ];
}
