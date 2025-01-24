<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Hairstyle;
use App\Models\Appointment;
use App\Models\Barber;
use App\Mail\BarberNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use App\Models\NonWorkingDay;
use Illuminate\Support\Facades\Log;


class RecruitmentController extends Controller
{
     // Gestion de l'étape 1 du formulaire 
     public function createStep1() { return view('recruitment.partials.etape-1-lieu'); }

     public function postStep1(Request $request)
     {
         $messages = [
             'location.required' => 'Vous devez choisir un lieu pour le rendez-vous.',
             'location.in' => 'La sélection doit être "À mon adresse" ou "Au salon".',
         ];
 
         try {
 
         $validatedData = $request->validate([
             'location' => 'required|in:A mon adresse,au salon',
         ], $messages);
         //dd($validatedData);
         session(['appointment.step1' => $validatedData]);
     
         // Renvoyer une réponse JSON pour AJAX
         return response()->json([
         'success' => true,
         //'redirectUrl' => route('appointments.partials.step2')
     ]);}  catch (\Illuminate\Validation\ValidationException $exception) {
         return response()->json([
             'success' => false,
             'errors' => $exception->errors()
         ]);
     }
 
     }

     public function createStep2() { return view('recruitment.partials.etape-2-prestation'); }

     public function postStep2(Request $request)
     {

     }

     public function createStep3() { return view('recruitment.partials.etape-3-choix-du-jour'); }

     public function postStep3(Request $request)
     {

     }

     public function createStep4() { return view('recruitment.partials.etape-4-date-heure'); }

     public function postStep4(Request $request)
     {

     }

     public function createStep5() { return view('recruitment.partials.etape-5-qui-se-coiffe'); }

     public function postStep5(Request $request)
     {

     }

     public function createStep6() { return view('recruitment.partials.etape-6-paiement'); }

     public function postStep6(Request $request)
     {

     }

     public function review() { return view('recruitment.review'); }

     public function postStep7(Request $request)
     {

     }
}
