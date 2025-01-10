<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Barber;
use App\Models\Customer;
use App\Models\Recruiter;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    public function handleAjax(Request $request)
    {
    $request->session()->put('account_type', $request->account_type); // Stocker dans la session
    return response()->json(['success' => true]);
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'account_type' => ['nullable'],
            'phone_number' => ['required', 'regex:/^(\+33|0)[1-9](\d{2}){4}$/'],
        ]);
        //dd($user );
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_type' => $request->account_type,
            'phone_number' => $request->phone_number
        ]);
        $account_type = $request->account_type;
        //dd($account_type);
       if($account_type === 'coiffeur_affilie')
       {
        // Création du profil barber associé
        Barber::create([
            'id_users' => $user->id, // Lier le barber à l'utilisateur créé
            // Mettre d'autres champs à null ou avec des valeurs par défaut
        ]);
        }
        elseif($account_type === 'particulier')
        {
            // Création du profil barber associé
        Customer::create([
            'id_users' => $user->id, // Lier le barber à l'utilisateur créé
            // Mettre d'autres champs à null ou avec des valeurs par défaut
        ]);
        }

        elseif($account_type === 'recruteur')
        {
            // Création du profil barber associé
        Recruiter::create([
            'id_users' => $user->id, // Lier le barber à l'utilisateur créé
            // Mettre d'autres champs à null ou avec des valeurs par défaut
        ]);
        }
        event(new Registered($user));

        Auth::login($user);
        if($request->session()->get('verifyfirstappointment') && $request->session()->get('verifyfirstappointment') == 1 )
        {
            return redirect()->route('appointment.process');
        } 
        else 
        {
        return redirect(route('dashboard', absolute: false));
        }
    }
}
