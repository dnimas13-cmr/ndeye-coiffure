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
    
        $validatedData = $request->validate([
            'location' => 'required|in:A mon adresse,au salon',
        ], $messages);
    
        session(['appointment.step1' => $validatedData]);
    
        return redirect()->route('appointments.partials.step2');
    }

    // Gestion de l'étape 2 du formulaire 
    public function createStep2() { return view('appointments.partials.step2'); }

    public function postStep2(Request $request)
    {
    $messages = [
        'address.required' => 'L\'adresse est obligatoire.',
        'address.string' => 'L\'adresse doit être une chaîne de caractères.',
    ];

    $validatedData = $request->validate([
        'address' => 'required|string',
    ], $messages);

    session(['appointment.step2' => $validatedData]);

    return redirect()->route('appointments.partials.step3');
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
    
        $validatedData = $request->validate([
            'timing' => 'required|in:je suis flexible,dans les prochains jours,dès que possible,à une date précise,autres',
            'otherDetail' => 'required_if:timing,autres|string',
        ], $messages);
    
        session(['appointment.step3' => $validatedData]);
    
        return redirect()->route('appointments.partials.step4');
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

    $validatedData = $request->validate([
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
    ], $messages);

    session(['appointment.step4' => $validatedData]);

    return redirect()->route('appointments.partials.step5');
}


    // Gestion de l'étape 5 du formulaire 
    public function createStep5() { return view('appointments.partials.step5'); }
    
    public function postStep5(Request $request)
{
    $messages = [
        'female_haircut' => 'Vous devez sélectionner une date.',
        'male_haircut' => 'Le format de la date n\'est pas valide.',
        'child_haircut' => 'Vous devez sélectionner un horaire.',
    ];
    
    $validatedData = $request->validate([
        'female_haircut' => 'required|integer|min:0',
        'male_haircut' => 'required|integer|min:0',
        'child_haircut' => 'required|integer|min:0',
    ]);

    session(['appointment.step5' => $validatedData]);

    return redirect()->route('appointments.partials.step6');
}


    // Gestion de l'étape 6 du formulaire 
    public function createStep6() { return view('appointments.partials.step6'); }

    public function postStep6(Request $request)
{
    $messages = [
        'haircut_id' => 'Vous devez choisir une coiffure',
    
    ];
    
    $validatedData = $request->validate([
        'haircut_id' => 'required|integer',
    ]);

    session(['appointment.step6' => $validatedData]);

    return redirect()->route('appointments.review');
}


    // Répétez pour les autres étapes...
    public function review() {
        $data = Session::all(); // Récupérez toutes les données de la session pour la revue
        return view('appointments.review', compact('data'));
    }
    public function store(Request $request) {
        // Validation finale et création du rendez-vous dans la base de données
        Session::forget('appointment'); // Nettoyer la session après la création du rendez-vous
        return response()->json(['success' => true]);
    }
}

