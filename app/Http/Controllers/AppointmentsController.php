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
        if (Auth::check()) {
            // L'utilisateur est connecté
            $request->session()->forget('account_type');

            // si la variable de session verifyfirstappointment existe alors on traite plutôt les données en session
            if($request->session()->get('verifyfirstappointment') && $request->session()->get('verifyfirstappointment') == 1 )
            {
                // Construire un tableau à partir des données de session
            $data = [
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
         $validator = Validator::make($data, $rules, $messages);

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
            return redirect()->route('register');
            
        }
        

        // on appelle la fonction selectbarber pour trier les barbers en fonction des données

        // on appelle la fonction matchbaber qui calcule le score et l'ajoute à un baber

        // on appelle la fonction notification, qui envoi les notifications aux profils sélectionnés

        // On appelle la fonction store qui crée un rendez-vous, supprime les données en sessions et redirige l'user vers la vue du rendez-vous
        // on lui envoi avec les détails de la commande et des messages
    }


    // Fonction permettant de filtrer les profils en fonction des données
    public function selectBarber($haircut_id, $start_time, $id_user)
    {
        // Récupérer la coiffure pour obtenir le temps de réalisation
        $hairstyle = Hairstyle::find($haircut_id);
        if (!$hairstyle) {
            return response()->json(['error' => 'Coiffure non trouvée'], 404);
        }

        // Calculer l'heure de fin du rendez-vous
        $start_time = Carbon::createFromFormat('Y-m-d H:i:s', $start_time);
        $end_time = (clone $start_time)->addMinutes($hairstyle->realisation_time);

        // Récupérer les barbiers qui peuvent réaliser la coiffure
        $barbersWithHairstyle = Barber::where('listhairstyles', 'like', '%' . $haircut_id . '%')->get();

        // Filtrer les barbiers par leur disponibilité
        $availableBarbers = [];
        foreach ($barbersWithHairstyle as $barber) {
            $conflicts = Appointment::where('id_barbers', $barber->id)
                                    ->where(function($query) use ($start_time, $end_time) {
                                        $query->whereBetween('appointment_start_time', [$start_time, $end_time])
                                              ->orWhereBetween('appointment_end_time', [$start_time, $end_time]);
                                    })->exists();

            if (!$conflicts) {
                $availableBarbers[] = $barber->id;
            }
        }

        return response()->json(['barbiers_disponibles' => $availableBarbers]);
    }

    // Fonction permettant de proposer les profil grâce à l'algorithme
    public function matchbarber() 
    {
        // on commence par définir l'algorithme

        // on crée une fonction qui calcule et ajoute le score de chaque profil dans un champ

        // on crée une fonction qui envoi les mails à chacun des 5 profils classés

        
    }

    public function sendnotification() 
    {
        // envoi les notifications emails

        // envoi les notifications notifs
 
    }



    public function store(Request $request) {
        // Validation finale et création du rendez-vous dans la base de données

        // on crée une fonction qui affiche un bloc
        Session::forget('appointment'); // Nettoyer la session après la création du rendez-vous
        return response()->json(['success' => true]);
    }

    public function message(User $id_user) {
        

        // on crée une fonction qui affiche un bloc de messagerie
        
    }

    public function updatestatus(User $id_user) {
        

        // fonction qui va permettre de changer le statut du rendez-vous et ajouter un coiffeur au rendez-vous
        // ensuite il appelle la fonction notification pour envoyer les mails au 2
        
    }
}

