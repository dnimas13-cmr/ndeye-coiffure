<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NonWorkingDay extends Model
{
    protected $table = 'non_working_days';
    protected $fillable = [
        'id_barbers',
         'specific_days',
         'reason',   
    ];
    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barbers');
    }
}
