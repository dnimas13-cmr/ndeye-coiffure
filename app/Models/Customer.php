<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id_users',
         'number_appointment',
         'number_courses',
    ];
}
