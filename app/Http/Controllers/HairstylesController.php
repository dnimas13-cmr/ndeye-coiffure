<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hairstyle;

class HairstylesController extends Controller
{
    public function createStep6() 
    { 
        
          // Récupérer toutes les coiffures
          $hairstyles = Hairstyle::all();

          // Passer les coiffures à la vue
          return view('appointments.partials.step6', compact('hairstyles'));
    
    }
}
