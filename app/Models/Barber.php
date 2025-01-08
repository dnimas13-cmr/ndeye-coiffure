<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Barber extends Model
{

     protected $fillable = [
         'id_users',
          'listformation',
          'listkill',
          'list_hairstyle',
          'bibliography',
          'year_of_experience',
          'reponse_time',
          'mission_acceptance_rate',
          'positive_reviews',
          'cni_photo',
     ];
}
