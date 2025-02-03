<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Barber;

class MessagingController extends Controller
{
    // Affiche la vue de messagerie
    public function view($barber_id)
    {
        $barber = Barber::with('user')->findOrFail($barber_id);
        return view('messaging', compact('barber'));
    }

    // Gère l'envoi du message
    public function send(Request $request)
    {
        $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'message' => 'required|string|max:1000',
        ]);

        // Logique pour stocker ou envoyer le message
        // Exemple : stockage dans une table messages
        return redirect()->route('userviewprofil', ['id' => $request->barber_id])
                         ->with('success', 'Message envoyé avec succès !');
    }
}
