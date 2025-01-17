<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentDetailsController extends Controller
{
    public function show($id)
    {
        $id = decrypt($id);
        $appointment = Appointment::findOrFail($id);
        return view('dashboard.details-appointment', compact('appointment'));
    }
}
