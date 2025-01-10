<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id_users',
         'notification_content',
         'notification_type',    
    ];
    
}
