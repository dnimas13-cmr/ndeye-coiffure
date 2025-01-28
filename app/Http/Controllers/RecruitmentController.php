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
use App\Models\Kill;


class RecruitmentController extends Controller
{
     // Gestion de l'étape 1 du formulaire 
     public function createStep1() { return view('recruitment.partials.etape-1-reason'); }

     public function postStep1(Request $request)
     {
        try { 
            
            $messages = [
             'reason.required' => 'Vous devez choisir une raison pour le rendez-vous.',
         ];
         $validatedData = $request->validate([
             'reason' => 'required',
         ], $messages);
         //dd($validatedData);
         session(['recruitment.step1' => $validatedData]);
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

     public function createStep2() { return view('recruitment.partials.etape-2-address'); }

     public function postStep2(Request $request)
     {
        $messages = [
            'address.required' => 'Vous devez choisir une adresse pour le recrutement',
            'address.in' => 'La sélection doit être du texte.',
        ];

        try {

        $validatedData = $request->validate([
            'address' => 'required|string',
        ], $messages);
        //dd($validatedData);

        session(['recruitment.step2' => $validatedData]);
    
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

     public function createStep3() { 
        
        $kills = Kill::all();
        
         // Retourner la vue avec les données
         return view('recruitment.partials.etape-3-choise-kills', compact('kills'));
     }

     public function postStep3(Request $request)
     {
         $messages = [
             'kills.required' => 'Vous devez choisir au moins une compétence.',
             'kills.array' => 'Les compétences doivent être un tableau.',
             'kills.*.string' => 'Chaque compétence doit être du texte.',
             'schoollevel.string' => 'Le niveau d\'étude doit être du texte.',
             'experienceyears.string' => 'Les années d\'expérience doivent être du texte.',
         ];
     
         try {
             $validatedData = $request->validate([
                 'kills' => 'required|array|min:1', // `kills` doit être un tableau avec au moins 1 élément
                 'kills.*' => 'string', // Chaque élément du tableau doit être une chaîne
                 'schoollevel' => 'nullable|string',
                 'experienceyears' => 'nullable|string',
             ], $messages);
     
             // Sauvegarder les données en session
             session(['recruitment.step3' => $validatedData]);
     
             return response()->json([
                 'success' => true,
             ]);
         } catch (\Illuminate\Validation\ValidationException $exception) {
             return response()->json([
                 'success' => false,
                 'errors' => $exception->errors(),
             ]);
         }
     }

     public function createStep4() { 
        // Récupérer les données de la session
        $killsIds = session('recruitment.step3.kills');
    
        // Vérifier si $killsIds est un tableau ou une chaîne
        if (is_array($killsIds)) {
            $killsIdsArray = $killsIds;
        } elseif (is_string($killsIds)) {
            $killsIdsArray = explode(',', $killsIds); // Convertir la chaîne en tableau
        } else {
            return redirect()->back()->with('error', 'Les compétences sélectionnées sont invalides.');
        }
    
        // Requête dans la table kills pour récupérer les enregistrements correspondants
        $kills = \App\Models\Kill::whereIn('id', $killsIdsArray)->get();
    
        if ($kills->isEmpty()) {
            return redirect()->back()->with('error', 'Les compétences sélectionnées n\'existent pas.');
        }
    
        // Créer un tableau pour enregistrer les kills sous forme kills1, kills2, ...
        $killsSessionData = [];
        foreach ($kills as $index => $kill) {
            $killsSessionData['kills' . ($index + 1)] = $kill->kills; // Exemple: 'kills1' => 'Maîtrise des tresses'
        }
    
        // Enregistrer les valeurs dans la session
        session(['kills2' => $killsSessionData]);
        
        return view('recruitment.partials.etape-4-date-hour'); 
    }

     public function postStep4(Request $request)
     {
        $messages = [
            'date.required' => 'Vous devez sélectionner une date.',
            'date.date' => 'Le format de la date n\'est pas valide.',
            'time.required' => 'Vous devez sélectionner un horaire.',
            'time.date_format' => 'Le format de l\'heure n\'est pas valide.',
        ];
        try {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ], $messages);
    
        session(['recruitment.step4' => $validatedData]);
    
        // Renvoyer une réponse JSON pour AJAX
        return response()->json([
            'success' => true,
            //'redirectUrl' => route('appointments.partials.step5')
        ]); }  catch (\Illuminate\Validation\ValidationException $exception) {
            return response()->json([
                'success' => false,
                'errors' => $exception->errors()
            ]);
        }
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
     /*$validatedData = NULL;
         $totalbabers = NULL;
         $matchTotalBarber = NULL;
         $validator = NULL;
         $saved = NULL;
         if (Auth::check()) {
             // L'utilisateur est connecté
             $request->session()->forget('account_type');
 
             // si la variable de session verifyfirstappointment existe alors on traite plutôt les données en session
             if($request->session()->get('verifyfirstappointment') && $request->session()->get('verifyfirstappointment') == 1 )
             {      }   */
     public function traitmentrecruitment(Request $request) 
     {
        $criterion = implode(', ', $request->session()->get('recruitment.step3.kills'));
                 // Construire un tableau à partir des données de session
             $validatedData = [
             'reason' => $request->session()->get('recruitment.step1.reason'),
             'address' => $request->session()->get('recruitment.step2.address'),
             'kills' => $criterion,
             'schoollevel' => $request->session()->get('recruitment.step3.schoollevel'),
             'experienceyears' => $request->session()->get('recruitment.step3.experienceyears'),
             'date' => $request->input('date'),
             'time' => $request->input('time'),
             // ajoutez les autres données
             ];
 
           // Définir les règles de validation pour chaque donnée
              $rules = [
             'reason' => 'required',
             'address' => 'required',
             'kills' => 'required',
             'schoollevel' => 'nullable',
             'experienceyears' => 'nullable',
             'date' => 'required|date',
             'time' => 'required|date_format:H:i',
             // ajoutez les règles pour les autres données
             ];
 
             // Messages d'erreur personnalisés
             $messages = [
             'reason.required' => 'La raison est obligatoire.',
             'address.required' => 'L\'adresse est obligatoire.',
             'kills.required' => 'Les compétences sont obligatoires.',
             'date.required' => 'La date est obligatoire.',
             'time.required' => 'Le temps est obligatoire.',
             'time.date_format' => 'Le format de l\'heure n\'est pas valide.',
             'date.date' => 'Le format de la date n\'est pas valide.',
             // ajoutez les messages pour les autres champs
             ]; 
 
            // Effectuer la validation
              $validator = Validator::make($validatedData, $rules, $messages);
              
              $dateTimeString = $validatedData['date'] . ' ' . $validatedData['time'] . ':00';
              $Endtime1 = $validatedData['date'] . ' ' . $validatedData['time'] . ':00';
             
             $formattedDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString);
             $Endtime =  Carbon::createFromFormat('Y-m-d H:i:s', $Endtime1);

             //dd($validatedData['kills']);
             $barber = $this->selectBarber($validatedData['kills'], $formattedDateTime, $Endtime);
             //dd($barber);
             $viewsbarber = $this->sendbarber($barber, $validatedData['kills']);

             return $viewsbarber;
             
             //dd($barber);
             //$barberfilter = $this->matchBarber($barber, $validatedData['address'], $validatedData['location']);
             //$notif = $this->sendNotification($barber);
             //$saved = $this->store($validatedData, $barber);   
 
         if ($validator->fails()) {
             // Redirection vers une page avec les erreurs de validation
             return redirect()->route('recruitment.partials.date-hour')->withErrors($validator)->withInput();
             }
            
         } 
             


      // Fonction permettant de filtrer les profils en fonction des données
    public function selectBarber($kills, $start_time, $endtime)
    {
       /* $hairstyle = Hairstyle::find($haircut_id);
        if (!$hairstyle) {
            return response()->json(['error' => 'Coiffure non trouvée'], 404);
        }*/
    
        $endTime = $endtime;
        $dayOfWeek = $start_time->format('l');
        //dd($dayOfWeek);
        
        $killsArray = array_map('trim', explode(',', $kills)); // Convertir '2,5' en [2, 5]
        //dd($killsArray);
        // Étape 1: Sélection des barbiers basés sur les compétences disponibles
        $barberslist = Barber::where(function ($query) use ($killsArray) {
            foreach ($killsArray as $kill) {
                $query->orWhereRaw("FIND_IN_SET(?, listkills) > 0", [$kill]);
            }
        })->pluck('id');
        //dd($barberslist);
        if ($barberslist->isEmpty()) {
            dump('Aucun barber avec ces compétences sélectionné');
        }
    
        $availableBarbers = collect();
    
        // Étape 2: Vérifier chaque barbier pour les disponibilités et les non-working days
        /*foreach ($barberslist as $barberId) {
            $barber = Barber::find($barberId);
    
            // Vérifier les jours non travaillés
            $nonWorking = $barber->nonWorkingDays()->where('id_barbers', $barberId)
                                       ->whereDate('specific_days', $start_time->toDateString())
                                       ->exists();
    
            if ($nonWorking) {
               // dump('Barber ' . $barberId . ' est non disponible aujourd’hui');
                continue;
            } */
    
            // Vérifier les disponibilités
           /* try {
            $isAvailable = $barber->availabilitys()
    ->where('id_barbers', $barberId)
    ->where(function ($query) use ($dayOfWeek, $start_time, $endTime) {
        // Vérifier les disponibilités récurrentes correspondant au jour de la semaine
        $query->where(function ($subQuery) use ($dayOfWeek, $start_time, $endTime) {
            $subQuery->where('day_of_week', $dayOfWeek)
                     ->where('is_recurrent', true)
                     ->whereTime('start_time', '>=', $start_time->format('H:i:s')) // Heure de début de disponibilité doit précéder ou être égale à l'heure de début du service
                     ->whereTime('end_time', '<=', $endTime->format('H:i:s')); // Heure de fin de disponibilité doit suivre ou être égale à l'heure de fin du service
                     
                    })

    
        // Ou vérifier si une date spécifique est définie et si les heures correspondent
        ->orWhere(function ($subQuery) use ($start_time, $endTime) {
            $subQuery->whereDate('specific_date', $start_time->toDateString())
                     ->whereTime('start_time', '>=', $start_time->format('H:i:s'))
                     ->whereTime('end_time', '<=', $endTime->format('H:i:s'));
                     
                    });
    })
    ->exists();
    } catch (\Exception $e) {
    // Capturer et loguer toute autre erreur
    report($e);
    $errorMessage = 'Une erreur est survenue : ' . $e->getMessage();
    // Stocker ou retourner l'erreur
    dd($errorMessage);
    return response()->json(['error' => $errorMessage], 500);
   
    } 
    $startTimeFormatted = $start_time->format('H:i:s');
    $endTimeFormatted = $endTime->format('H:i:s');
    $startDateFormatted = $start_time->format('Y-m-d');
    $query = "
    SELECT EXISTS (
        SELECT 1 FROM `availabilitys`
        WHERE `id_barbers` = ?
        AND (
            (
                `day_of_week` = ?
                AND `is_recurrent` = 1
                AND TIME(`start_time`) <= ?
                AND TIME(`end_time`) >= ?
            )
            OR (
                DATE(`specific_date`) = ?
                AND TIME(`start_time`) <= ?
                AND TIME(`end_time`) >= ?
            )
        )
    ) AS `is_available`;
";

$isAvailable = DB::select($query, [
    $barberId, 
    $dayOfWeek, 
    $startTimeFormatted, 
    $endTimeFormatted,
    $startDateFormatted,
    $startTimeFormatted, 
    $endTimeFormatted
]);
dd($isAvailable);
            if (!$isAvailable) {
               
                dump('Barber ' . $barberId . ' n’a pas de disponibilité à ce moment');
                continue;
            } */
    
            // Étape 3: Vérifier les rendez-vous existants
           /* $hasAppointment = $barber->appointments()->where('id_barbers', $barberId)
                                         ->where('appointment_start_time', '<=', $start_time->format('H:i:s'))
                                         ->where('appointment_end_time', '>=', $endTime->format('H:i:s'))
                                         ->exists();
    
            if ($hasAppointment) {
                //dump('Barber ' . $barberId . ' a déjà un rendez-vous programmé');
                continue;
            } 
    
            $availableBarbers->push($barberId);
        }*/
    
        //dump('Barbiers disponibles:', $availableBarbers);
        return $barberslist;
    }


    // Fonction pour envoyer les données des barbers à afficher
    public function sendbarber($listbarber, $listkills)
{
    // Vérifier et formater $listbarber
    if (is_string($listbarber)) {
        $listbarber = explode(',', $listbarber); // Transformer "1,2" en [1, 2]
    }
    
    if (is_array($listbarber)) {
        return redirect()->back()->with('error', 'Liste des barbers invalide.');
    }

    // Vérifier et formater $listkills
    
    if (is_string($listkills)) {
        $listkills = array_map('trim', explode(',', $listkills)); // Transformer "1,2,3" en [1, 2, 3]
    }
    //dd($listkills);
    if (!is_array($listkills)) {
        return redirect()->back()->with('error', 'Liste des compétences invalide.');
    }

    // Requête pour récupérer les barbers correspondant à $listbarber
    $barbers = \App\Models\Barber::whereIn('id', $listbarber)->get();
    //dd($listbarber);
    // Requête pour récupérer les compétences correspondant à $listkills
    $kills = \App\Models\Kill::whereIn('id', $listkills)->get();
    dd($kills);
    // requete pour récupérer les user correspondant à listbarber
    $idusers = \App\Models\Barber::whereIn('id', $listbarber)->pluck('id_users');
    //dd($idusers);

    $users = \App\Models\User::whereIn('id', $idusers)->get();

    //dd($users);
    $countOccurrences = \App\Models\Recruitment::whereIn('id_babers', $listbarber)
    ->selectRaw('id_babers, COUNT(*) as count')
    ->groupBy('id_babers')
    ->get();
    //dd($countOccurrences);

    // Vérification que des données existent
    if ($barbers->isEmpty() || $kills->isEmpty()) {
        return redirect()->back()->with('error', 'Aucun barber ou compétence correspondant trouvé.');
    }

    // Redirection vers la vue avec les données
    return view('recruitment.partials.etape-5-choisebarber', compact('barbers', 'kills', 'users','countOccurrences'));
}

}
