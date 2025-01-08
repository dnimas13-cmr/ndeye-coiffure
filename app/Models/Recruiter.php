<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $fillable = [
        'id_users',
         'list_kill_wanted',
         'bibliography',
         'cni_photo',
    ];
}
