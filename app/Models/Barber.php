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
          'performance_score',
     ];
      // Relation avec les jours non travaillés
    public function nonWorkingDays()
    {
        // Assurez-vous que le modèle NonWorkingDay est bien lié par une clé étrangère 'id_barbers'
        return $this->hasMany(NonWorkingDay::class, 'id_barbers');
    }

    // Relation avec les disponibilités
    public function availabilitys()
    {
        // Assurez-vous que le modèle Availability est bien lié par une clé étrangère 'id_barbers'
        return $this->hasMany(Availability::class, 'id_barbers');
    }

    // Relation avec les rendez-vous
    public function appointments()
    {
        // Assurez-vous que le modèle Appointment est bien lié par une clé étrangère 'id_barbers'
        return $this->hasMany(Appointment::class, 'id_barbers');
    }
}
