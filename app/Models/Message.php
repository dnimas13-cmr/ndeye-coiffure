<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id_user1',
         'id_user2',
         'id_appointments',
         'id_recruitments',
         'id_administrations',
         'content',     
    ];
}
