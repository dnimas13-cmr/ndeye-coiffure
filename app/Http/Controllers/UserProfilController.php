<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\User;
use App\Models\Kill;
use App\Models\Hairstyle;

class UserProfilController extends Controller
{
    public function viewProfil($id)
    {
        $barber = Barber::with('user')->find($id);

        if (!$barber) {
            return redirect()->back()->with('error', 'Profil non trouvé.');
        }

        // Récupérer les compétences
        $kills = Kill::whereIn('id', explode(',', $barber->listkills))->get();

        // Récupérer les coiffures
        $hairstyleIds = explode(',', $barber->listhairstyles);
        $hairstyles = Hairstyle::whereIn('id', $hairstyleIds)->get();

        $formations = explode(',', $barber->listformation);

        return view('profile.userviewprofil', [
            'barber' => $barber,
            'kills' => $kills,
            'hairstyles' => $hairstyles,
            'formations' => $formations
        ]);
    }
}
