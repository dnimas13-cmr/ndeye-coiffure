<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class DashboardAppointmentController extends Controller
{
    
     // Méthode pour afficher le tableau de bord
     public function index()
     {
         return view('dashboard'); // ou 'dashboard' si vous l'avez nommé ainsi
     }
    
     public function appointmentlink()
     {
         // Récupérer l'ID de l'utilisateur connecté
         $userId = auth()->id();
     
         // Récupérer tous les rendez-vous pour l'utilisateur connecté où son ID est dans la liste 'selected_profile'
         $appointments = Appointment::whereRaw("FIND_IN_SET(?, selected_profile) > 0", [$userId])->get();
     
         // Retourner la vue avec les données
         return view('dashboard.dashboard-appointment', compact('appointments'));
     }
     
// Méthode pour afficher les détails d'un rendez-vous
public function details($id)
{
    $appointmentId = decrypt($id); // Décryptage de l'ID du rendez-vous
    $appointment = Appointment::find($appointmentId);
    
    if (!$appointment) {
        return redirect()->route('dashboard')->with('error', 'Rendez-vous non trouvé');
    }
    
    return view('dashboard.details-appointment', compact('appointment'));
}
}
