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

class ChoiseController extends Controller

{
    
    public function viewerr(): View
    {
        return view('auth.choise-type-account');
    }
    
    
    public function creationsessionvar(Request $request)
    {
        try {
        $request->validate([
            'account_type' => 'required|in:coiffeur_affilie,particulier,recruteur',
        ]);
        $request->session()->put('account_type', $request->account_type); // Stocker dans la session
        return response()->json(['success' => true]);
    }  catch (\Illuminate\Validation\ValidationException $exception) {
        return response()->json([
            'success' => false,
            'errors' => $exception->errors()
        ]);
    }
}
}