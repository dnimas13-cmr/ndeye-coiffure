<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model

{
    protected $table = 'appointments';
    protected $fillable = [
        'id_customers',
        'id_hairstyles',
        'id_barbers', 
         'appointment_start_time',
         'appointment_end_time',
         'appointment_adress',
         'type_adress',
         'person_type',
         'number_of_people_to_do_hair',
         'price',
         'status',
         'selected_profile',
         'rejected_profile',
    ];
    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barbers');
    }
}
