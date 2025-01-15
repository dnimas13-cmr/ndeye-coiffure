<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'availabilitys';
    protected $fillable = [
        'id_barbers',
         'day_of_week',
         'start_time',
         'end_time',
         'is_recurrent',
         'specific_date',
    ];
    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barbers');
    }
}
