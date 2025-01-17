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

class AppointmentsController extends Controller
{
    
    // Gestion de l'étape 1 du formulaire 
    public function createStep1() { return view('appointments.partials.step1'); }

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

    // Gestion de l'étape 2 du formulaire 
    public function createStep2() { return view('appointments.partials.step2'); }

    public function postStep2(Request $request)
    {
    $messages = [
        'address.required' => 'L\'adresse est obligatoire.',
        'address.string' => 'L\'adresse doit être une chaîne de caractères.',
    ];
    try {
    $validatedData = $request->validate([
        'address' => 'required|string',
    ], $messages);

    session(['appointment.step2' => $validatedData]);

    // Renvoyer une réponse JSON pour AJAX
    return response()->json([
        'success' => true,
        'redirectUrl' => route('appointments.partials.step3')
    ]); }  catch (\Illuminate\Validation\ValidationException $exception) {
        return response()->json([
            'success' => false,
            'errors' => $exception->errors()
        ]);
    }
    }


    // Gestion de l'étape 3 du formulaire 
    public function createStep3() { return view('appointments.partials.step3'); }

    public function postStep3(Request $request)
    {
        $messages = [
            'timing.required' => 'Veuillez spécifier quand vous aurez besoin du service.',
            'timing.in' => 'La sélection de temps n\'est pas valide.',
            'otherDetail.required_if' => 'Veuillez fournir des détails pour l\'option "Autres".',
        ];
        try {
        $validatedData = $request->validate([
            'timing' => 'required|in:je suis flexible,dans les prochains jours,dès que possible,à une date précise,autres',
            'otherDetail' => 'required_if:timing,autres|string',
        ], $messages);
    
        session(['appointment.step3' => $validatedData]);
        //session(['otherDetail' => $validatedData]);
    
       // Renvoyer une réponse JSON pour AJAX
       return response()->json([
        'success' => true,
        //'redirectUrl' => route('appointments.partials.step4')
    ]); }  catch (\Illuminate\Validation\ValidationException $exception) {
        return response()->json([
            'success' => false,
            'errors' => $exception->errors()
        ]);
    }
    }


    // Gestion de l'étape 4 du formulaire 
    public function createStep4() { return view('appointments.partials.step4'); }

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

    session(['appointment.step4' => $validatedData]);

    // Renvoyer une réponse JSON pour AJAX
    return response()->json([
        'success' => true,
        'redirectUrl' => route('appointments.partials.step5')
    ]); }  catch (\Illuminate\Validation\ValidationException $exception) {
        return response()->json([
            'success' => false,
            'errors' => $exception->errors()
        ]);
    }
}


    // Gestion de l'étape 5 du formulaire 
    public function createStep5() { return view('appointments.partials.step5'); }
    
    public function postStep5(Request $request)
{
    $messages = [
        'female_haircut' => 'Veuillez choisir un type de coiffure.',
        'male_haircut' => 'Veuillez choisir un type de coiffure.',
        'child_haircut' => 'Veuillez choisir un type de coiffure.',
    ];
    try {
    $validatedData = $request->validate([
        'female_haircut' => 'required|integer|min:0',
        'male_haircut' => 'required|integer|min:0',
        'child_haircut' => 'required|integer|min:0',
    ]);

    session(['appointment.step5' => $validatedData]);

    // Renvoyer une réponse JSON pour AJAX
    return response()->json([
        'success' => true,
        //'redirectUrl' => route('appointments.partials.step6')
    ]); }  catch (\Illuminate\Validation\ValidationException $exception) {
        return response()->json([
            'success' => false,
            'errors' => $exception->errors()
        ]);
    }
}


    // Gestion de l'étape 6 du formulaire 
    public function createStep6() { return view('appointments.partials.step6'); }

    public function postStep6(Request $request)
{
    // Messages personnalisés pour chaque type de validation
    $messages = [
        'haircut_id.required' => 'Vous devez choisir une coiffure',
        //'haircut_id.integer' => 'L\'identifiant de la coiffure doit être un entier',

    ];

    try {
        // Validation des données reçues
        $validatedData = $request->validate([
            'haircut_id' => 'required',
        ], $messages);

        // Stockage des données validées en session
        session(['appointment.step6' => $validatedData]);
        return view('appointments.review');
        // Réponse en cas de succès
            //return response()->json([
           // 'success' => true,
            //'message' => 'La coiffure a été programmée avec succès.'
        //]);
    } catch (\Illuminate\Validation\ValidationException $exception) {
        // Réponse en cas d'erreur de validation
        return response()->json([
            'success' => false,
            'errors' => $exception->errors()
        ]);
    }
}


    // Répétez pour les autres étapes...
    public function review() {
        $data = Session::all(); // Récupérez toutes les données de la session pour la revue
        return view('appointments.review', compact('data'));
    }

    // Fonction où se passe tout le traitement et appele les autres autres fonnctions

    public function traitmentappointment(Request $request) 
    {
        $validatedData = NULL;
        $totalbabers = NULL;
        $matchTotalBarber = NULL;
        $validator = NULL;
        if (Auth::check()) {
            // L'utilisateur est connecté
            $request->session()->forget('account_type');

            // si la variable de session verifyfirstappointment existe alors on traite plutôt les données en session
            if($request->session()->get('verifyfirstappointment') && $request->session()->get('verifyfirstappointment') == 1 )
            {
                // Construire un tableau à partir des données de session
            $validatedData = [
            'location' => $request->session()->get('appointment.step1.location'),
            'address' => $request->session()->get('appointment.step2.address'),
            'timing' => $request->session()->get('appointment.step3.timing'),
            //'otherDetail' => $request->session()->get('appointment.step3.otherDetail'),
            'date' => $request->session()->get('appointment.step4.date'),
            'time' => $request->session()->get('appointment.step4.time'),
            'female_haircut' => $request->session()->get('appointment.step5.female_haircut'),
            'male_haircut' => $request->session()->get('appointment.step5.male_haircut'),
            'child_haircut' => $request->session()->get('appointment.step5.child_haircut'),
            'haircut_id' => $request->session()->get('appointment.step6.haircut_id'),
            // ajoutez les autres données
            ];

        // Définir les règles de validation pour chaque donnée
             $rules = [
            'location' => 'required',
            'address' => 'required',
            'timing' => 'required',
            'date' => 'required',
            'time' => 'required',
            'female_haircut' => 'required',
            'male_haircut' => 'required',
            'child_haircut' => 'required',
            'haircut_id' => 'required',
            // ajoutez les règles pour les autres données
            ];

        // Messages d'erreur personnalisés
            $messages = [
            'date.required' => 'Le champ data1 est obligatoire.',
            'location.required' => 'Le champ data2 est obligatoire.',
            // ajoutez les messages pour les autres champs
            ]; 

        // Effectuer la validation
         $validator = Validator::make($validatedData, $rules, $messages);

        if ($validator->fails()) {
            // Redirection vers une page avec les erreurs de validation
            return redirect()->route('appointments.review')->withErrors($validator)->withInput();
            }   
        } 
            else 
        {
            // si cette variable n'hexiste pas dans ce cas on traite les données envoyé par la requette POST
            $validatedData = $request->validate([
                'location' => ['required'],
                'address' => ['required'],
                'timing' => ['required'],
                'date' => ['required'],
                'time' => ['required'],
                'female_haircut' => ['required'],
                'male_haircut' => ['required'],
                'child_haircut' => ['required'],
                'haircut_id' => ['required'],
            ], [
                'location.required' => 'Le champ nom est obligatoire.',
                'address.required' => 'Le nom doit être une chaîne de caractères.',
                'timing.required' => 'Le nom ne peut pas dépasser 255 caractères.',
                'date.required' => 'L’adresse e-mail est requise.',
            ]);
            if ($validator->fails()) {
                // Redirection vers une page avec les erreurs de validation
                return redirect()->route('appointments.review')->withErrors($validator)->withInput();
            }
            }
        } else {
            // L'utilisateur n'est pas connecté
            $request->session()->put('account_type', 'particulier');
            $request->session()->put('verifyfirstappointment', 1);

            // Redirection vers la page de création de compte
            return redirect()->route('login');
            
        }
        $dateTimeString = $validatedData['date'] . ' ' . $validatedData['time'] . ':00';
        //dd($dateTimeString);
        $formattedDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString);

        $barber = $this->selectBarber($validatedData['haircut_id'], $formattedDateTime);
        //dd($barber);
        //$barberfilter = $this->matchBarber($barber, $validatedData['address'], $validatedData['location']);
        $notif = $this->sendNotification($barber);
        $saved = $this->store($validatedData, $barber);
    }


    // Fonction permettant de filtrer les profils en fonction des données
    public function selectBarber($haircut_id, $start_time)
    {
        $hairstyle = Hairstyle::find($haircut_id);
        if (!$hairstyle) {
            return response()->json(['error' => 'Coiffure non trouvée'], 404);
        }
    
        $endTime = (clone $start_time)->addHours($hairstyle->realisation_time);
        $dayOfWeek = $start_time->format('l');
        //dd($dayOfWeek);
        //dd($start_time->format('H:i:s'));
        // Étape 1: Sélection des barbiers basés sur les hairstyles disponibles
        $barbersWithHairstyle = Barber::whereRaw("FIND_IN_SET(?, listhairstyles) > 0", [$haircut_id])->pluck('id');
        //dd($barbersWithHairstyle);
        if ($barbersWithHairstyle->isEmpty()) {
            //dump('Aucun barber avec le hairstyle spécifié');
        }
    
        $availableBarbers = collect();
    
        // Étape 2: Vérifier chaque barbier pour les disponibilités et les non-working days
        foreach ($barbersWithHairstyle as $barberId) {
            $barber = Barber::find($barberId);
    
            // Vérifier les jours non travaillés
            $nonWorking = $barber->nonWorkingDays()->where('id_barbers', $barberId)
                                       ->whereDate('specific_days', $start_time->toDateString())
                                       ->exists();
    
            if ($nonWorking) {
               // dump('Barber ' . $barberId . ' est non disponible aujourd’hui');
                continue;
            }
    
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
            $hasAppointment = $barber->appointments()->where('id_barbers', $barberId)
                                         ->where('appointment_start_time', '<=', $start_time->format('H:i:s'))
                                         ->where('appointment_end_time', '>=', $endTime->format('H:i:s'))
                                         ->exists();
    
            if ($hasAppointment) {
                //dump('Barber ' . $barberId . ' a déjà un rendez-vous programmé');
                continue;
            }
    
            $availableBarbers->push($barberId);
        }
    
        //dump('Barbiers disponibles:', $availableBarbers);
        return response()->json($availableBarbers);
    }
    

    // Fonction permettant de proposer les profil grâce à l'algorithme
    public function matchBarber($barberIdsJson, $location, $type_address)
    {
        // Décode le JSON pour obtenir les ID des barbiers
        $barberIds = json_decode($barberIdsJson, true);

        // Constants
        $NUMBER_OF_POSITIVE_REVIEWS = 40;
        $LOCATION_ADDRESS = 30;
        $AVERAGE_RESPONSE_TIME = 20;
        $NUMBER_OF_MISSION_ACCEPTANCES = 10;

        // Total number of reviews on the site
        $site_total_numbers_reviews = Barber::sum('positive_reviews');

        // Prepare array to store scores
        $barbersScores = [];

        foreach ($barberIds as $id) {
            $barber = Barber::with('user')->find($id);
            if (!$barber) continue;

            // Score reviews calculation
            $numbers_reviews = $barber->positive_reviews;
            $total_numbers_reviews = $barber->reviews;  // Assuming this attribute exists
            $score_quality = $numbers_reviews / max($total_numbers_reviews, 1);
            $score_quantity = $total_numbers_reviews / max($site_total_numbers_reviews, 1);
            $score_factor = $score_quantity * $score_quality;
             $score_reviews = NUMBER_OF_POSITIVE_REVIEWS * $score_factor;

            // Location score calculation
            if ($type_address === "au salon") {
            $location_final_address = 0; // No distance if service is at the salon
            } else {
            $user_location_address = $barber->user->location_address;
            // Calculate distance using Google Maps API or similar service
            $location_final_address = $this->calculateDistance($user_location_address, $location);
            }
            $location_address_score = $this->determineLocationScore($location_final_address) + LOCATION_ADDRESS;

            // Response time score calculation
            $reponse_time = $barber->reponse_time ?? 0;
            $time_reponse_score = $this->determineResponseScore($reponse_time) + AVERAGE_RESPONSE_TIME;

            // Performance score
            $performance_score = $time_reponse_score + $score_reviews + $location_address_score;

            // Store score
            $barbersScores[$id] = $performance_score;

            // Update barber's performance score in the database
            $barber->performance_score = $performance_score;
            $barber->save();
    }

            // Sort and get top 10 barbers based on performance score
            arsort($barbersScores);
            $topBarbers = array_slice(array_keys($barbersScores), 0, 10, true);

            // Retrieve the top barbers' information
            $topBarbersData = Barber::whereIn('id', $topBarbers)->get();

            // Prepare JSON response
            $matchTotalBarber = response()->json([
            'top_barbers' => $topBarbersData
            ])->getContent();

            return $matchTotalBarber;
        }

    public function calculateDistance($origin, $destination)
    {
    // Remplacez 'YOUR_API_KEY' par votre clé API Google Maps réelle
    $apiKey = 'AIzaSyDeKORSeUf85fccSR43YcjwvVJIuS0mYbc';

    // URL de l'API Google Maps Directions
    $url = "https://maps.googleapis.com/maps/api/directions/json?origin=" . urlencode($origin) . "&destination=" . urlencode($destination) . "&key=" . $apiKey;

    // Initialiser cURL pour faire une requête HTTP GET
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Exécuter la requête cURL
    $response = curl_exec($ch);
    curl_close($ch);

    // Décoder la réponse JSON
    $response = json_decode($response, true);

    // Vérifier si la requête a réussi
    if (!empty($response['routes'])) {
        // Récupérer la distance depuis la première route
        $distance = $response['routes'][0]['legs'][0]['distance']['value'] / 1000;  // Convertir de mètres en kilomètres
        return $distance;
    }

    // Retourner 0 si aucune route n'a été trouvée
    return 0;
    }

    public function determineLocationScore($distance) {
    if ($distance <= 3) {
        return 1;
    } elseif ($distance <= 5) {
        return 0.8;
    } elseif ($distance <= 10) {
        return 0.5;
    } elseif ($distance <= 15) {
        return 0.3;
    } else {
        return 0.2;
    }
    }

    public function determineResponseScore($reponse_time)
        {
    // Définir les seuils de temps et les scores associés
    $timeThresholds = [
        10 => 1.0,   // Temps de réponse jusqu'à 10 minutes
        30 => 0.8,   // Temps de réponse de 11 à 30 minutes
        60 => 0.7,   // Temps de réponse de 31 minutes à 1 heure
        90 => 0.5,   // Temps de réponse de 1 heure à 1 heure et demie
        240 => 0.3,  // Temps de réponse de 2 heures à 4 heures
    ];

    $defaultFactor = 0.1; // Score pour les temps de réponse supérieurs à 4 heures

    // Itérer à travers les seuils pour déterminer le score
    foreach ($timeThresholds as $threshold => $score) {
        if ($reponse_time <= $threshold) {
            return $score;
        }
    }

    // Si aucun seuil n'est satisfait, retourner le facteur par défaut
    return $defaultFactor;
        }

public function sendNotification($barberIdsJson)
{
    $barberIds = json_decode($barberIdsJson->content(), true);
    $users = User::whereIn('id', $barberIds)->get();
    
    $message = 'Vous avez reçu de demande de coiffure sur notre site web, merci de venir confirmer la demande le plus tôt possible.';

    Log::info('Starting email sending process.');
    foreach ($users as $user) {
        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            Log::info("Invalid email address for user: {$user->id}");
            continue;
        }
        Log::info("Processing user: {$user->email}");
        
        try {
            // Envoi de l'email
            Mail::to($user->email)->queue(new BarberNotification($message));
           /* Mail::send([], [], function ($message) use ($user) {
                $message->to($user->email)
                        ->from('no_reply@ndeye-coiffure.fr')
                        ->subject('Confirmation de la validation du rendez-vous')
                        ->setBody('Bravo, vous avez maintenant validé le rendez-vous, merci de consulter les détails du rendez-vous');
            });*/
            Log::info("Email sent to {$user->email}");
            // Enregistrement de la notification dans la base de données
            $notification = new Notification([
                'id_users' => $user->id,
                'notification_content' => $message
            ]);
            $notification->save();
        } catch (\Exception $e) {
            Log::error("Failed to send email or save notification for user {$user->id}: " . $e->getMessage());
        }
    }
}


public function store($validatedData, $barberIds2)
{
    // Assumer que $validatedData est un tableau avec les clés nécessaires
    //$userId = session('user_id');  // Obtenir l'ID de l'utilisateur connecté stocké dans la session
    $barberIds = json_decode($barberIds2->content(), true);
    $barberIdsString = implode(',', $barberIds);
    // Trouver les informations du hairstyle
    $hairstyle = Hairstyle::find($validatedData['haircut_id']);
    if (!$hairstyle) {
        return response()->json(['error' => 'Hairstyle not found'], 404);
    }
    //dd($validatedData);
    // Calculer les temps de début et de fin du rendez-vous
    //$validatedData['date'] . ' ' . $validatedData['time'] . ':00';
    $start_time = new Carbon($validatedData['date'] . ' ' . $validatedData['time'] .':00');
    $end_time = (clone $start_time)->addHours($hairstyle->realisation_time);

    $startTime = $start_time->format('H:i:s');
    $endTime = $end_time->format('H:i:s');
    $id_customer = Auth::id();
    //dd($id_customer);

    // Créer le rendez-vous
    $appointment = new Appointment([
        'id_customers' => $id_customer,
        'id_hairstyles' => $validatedData['haircut_id'],
        'id_barbers' => null, // Ce champ pourrait être omis ou utilisé différemment selon le modèle de données
        'appointment_start_time' => $startTime,
        'appointment_end_time' => $endTime,
        'appointment_adress' => $validatedData['address'],
        'type_adress' => $validatedData['location'],
        'person_type' => NULL,
        'number_of_people_to_do_hair' => NULL,
        'price' => $hairstyle->hairstyle_price,
        'status' => 'wainting',
        'selected_profile' => $barberIdsString
    ]);

    $appointment->save();
    Session::forget('verifyfirstappointment');
    Session::forget('appointment.step1.location');
    Session::forget('appointment.step2.address');
    Session::forget('appointment.step3.timing');
    Session::forget('appointment.step3.otherDetail');
    Session::forget('appointment.step4.date');
    Session::forget('appointment.step4.time');
    Session::forget('appointment.step5.female_haircut');
    Session::forget('appointment.step5.male_haircut');
    Session::forget('appointment.step5.child_haircut');
    Session::forget('appointment.step6.haircut_id');

    return redirect(route('dashboard', absolute: false));
    
}

    public function message(User $id_user) {
        

        // on crée une fonction qui affiche un bloc de messagerie
        
    }

    public function updateStatus($id_appointment)
    {
        // Récupérer le rendez-vous
        $appointment = Appointment::findOrFail($id_appointment);
    
        // Mettre à jour le statut et l'id_barbers
        $currentUser = Auth::user();
        $appointment->status = 'pending';
        $appointment->id_barbers = $currentUser->id;
        
        // Sauvegarder les modifications
        $appointment->save();
    
        // Envoi d'email et notification au barber (utilisateur actuel)
       
        /*Mail::send([], [], function ($message) use ($currentUser) {
            $message->to($currentUser->email)
                    ->subject('Confirmation de votre rendez-vous')
                    ->text('Bravo, un coiffeur vient de valider votre votre rendez-vous, vous pouvez maintenant entrer en contact avec lui via la messagerie interne');
        }); */
        //dd( $currentUser);
        // Création de la notification pour le barber
        $notification = new Notification([
            'id_users' => $currentUser->id,
            'notification_content' => 'Bravo, vous avez maintenant validé le rendez-vous, merci de consulter les détails du rendez-vous'
        ]);
        $notification->save();
    
        // Envoi d'email et notification au client
        $customer = User::findOrFail($appointment->id_customers);
        /*Mail::send([], [], function ($message) use ($customer) {
            $message->to($customer->email)
                    ->subject('Confirmation de votre rendez-vous')
                    ->text('Bravo, un coiffeur vient de valider votre votre rendez-vous, vous pouvez maintenant entrer en contact avec lui via la messagerie interne');
        });*/
       
        // Création de la notification pour le client
        $notification = new Notification([
            'id_users' => $customer->id,
            'notification_content' => 'Bravo, un coiffeur vient de valider votre votre rendez-vous, vous pouvez maintenant entrer en contact avec lui via la messagerie interne'
        ]);
        $notification->save();
    
        return redirect()->route('dashboard-appointment');
    }
   
    
}

