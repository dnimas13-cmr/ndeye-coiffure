<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'id_customers',
         'id_barbers',
         'messages',
         'review_date',
         'reviews_type',
         'number_stars',    
    ];
}