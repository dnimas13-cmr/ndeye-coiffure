<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChoiseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\HairstylesController;
use App\Http\Controllers\DashboardAppointmentController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/', function () {
    return view('index');
});

Route::get('messages', function () {
    return view('messages');
});

Route::get('dashboard-home', function () {
    return view('homedashboard');
});

Route::get('appointment', function () {
    return view('appointment.createappointment');
});

// Route choix du type de rendez-vous
Route::get('choix-type-compte', [ChoiseController::class, 'viewerr'])->name('auth.choix-type-compte');
Route::post('choix-type-compte', [ChoiseController::class, 'creationsessionvar']);


//Route rendez-vous
Route::get('/appointments/partials/step-1-location', [AppointmentsController::class, 'createStep1'])->name('appointments.partials.step1');
Route::post('/appointments/partials/step-1-location', [AppointmentsController::class, 'postStep1']);
Route::get('/appointments/partials/step-2-address', [AppointmentsController::class, 'createStep2'])->name('appointments.partials.step2');
Route::post('/appointments/partials/step-2-address', [AppointmentsController::class, 'postStep2']);
Route::get('/appointments/partials/step-3-timing', [AppointmentsController::class, 'createStep3'])->name('appointments.partials.step3');
Route::post('/appointments/partials/step-3-timing', [AppointmentsController::class, 'postStep3']);
Route::get('/appointments/partials/step-4-choose-day', [AppointmentsController::class, 'createStep4'])->name('appointments.partials.step4');
Route::post('/appointments/partials/step-4-choose-day', [AppointmentsController::class, 'postStep4']);
Route::get('/appointments/partials/step-5-who-is-hair', [AppointmentsController::class, 'createStep5'])->name('appointments.partials.step5');
Route::post('/appointments/partials/step-5-who-is-hair', [AppointmentsController::class, 'postStep5']);
//Route::get('/appointments/partials/step6', [AppointmentsController::class, 'createStep6'])->name('appointments.partials.step6');
Route::get('/appointments/partials/step-6-choose-hairstyle', [HairstylesController::class, 'createStep6'])->name('appointments.partials.step6');
Route::post('/appointments/partials/step-6-choose-hairstyle', [AppointmentsController::class, 'postStep6']);
Route::get('/appointments/review', [AppointmentsController::class, 'review'])->name('appointments.review');
Route::post('/appointments/store', [AppointmentsController::class, 'store'])->name('appointments.store');

Route::get('/appointment-process', [AppointmentsController::class, 'traitmentappointment'])->name('appointment.process');
Route::post('/appointments/review', [AppointmentsController::class, 'traitmentappointment']);

// dashboard affichage
//Route::get('/dashboard-appointments', [DashboardAppointmentController::class, 'appointmentlink'])->name('dashboard-appointment');
Route::get('/dashboard/mes-reservations', [DashboardAppointmentController::class, 'appointmentlink'])->name('mes-reservations');

Route::get('/details-appointment/{id}', [DashboardAppointmentController::class, 'details'])->name('details-appointment');
Route::get('/validate-appointment/{id}', [AppointmentsController::class, 'updateStatus'])->name('validate-appointment');

// Route pour les recrutements
Route::get('/recruitment/partials/step-1-reason', [RecruitmentController::class, 'createStep1'])->name('recruitment.partials.reason');
Route::post('/recruitment/partials/step-1-reason', [RecruitmentController::class, 'postStep1']);
Route::get('/recruitment/partials/step-2-address', [RecruitmentController::class, 'createStep2'])->name('recruitment.partials.address');
Route::post('/recruitment/partials/step-2-address', [RecruitmentController::class, 'postStep2']);
Route::get('/recruitment/partials/step-3-choise-kills', [RecruitmentController::class, 'createStep3'])->name('recruitment.partials.choise-kills');
Route::post('/recruitment/partials/step-3-choise-kills', [RecruitmentController::class, 'postStep3']);
Route::get('/recruitment/partials/step-4-date-hour', [RecruitmentController::class, 'createStep4'])->name('recruitment.partials.date-hour');
Route::post('/recruitment/partials/step-4-date-hour', [RecruitmentController::class, 'traitmentrecruitment']);
Route::get('/recruitment/partials/step-5-choisebarber', [RecruitmentController::class, 'createStep5'])->name('recruitment.partials.choisebarber');
Route::post('/recruitment/partials/step-5-choisebarber', [RecruitmentController::class, 'postStep5']);
Route::get('/recruitment/partials/step-6-paiement', [RecruitmentController::class, 'createStep6'])->name('recruitment.partials.paiement');
Route::post('/recruitment/partials/step-6-paiement', [RecruitmentController::class, 'postStep6']);
//Route::get('/appointments/partials/step6', [AppointmentsController::class, 'createStep6'])->name('appointments.partials.step6');

Route::get('/recruitment/review', [RecruitmentController::class, 'review'])->name('recruitment.review');
Route::post('/recruitment/store', [RecruitmentController::class, 'store'])->name('recruitment.store');

Route::get('/recruitment-process', [RecruitmentController::class, 'traitmentrecruitment'])->name('recruitment.process');
Route::post('/recruitment/review', [RecruitmentController::class, 'traitmentrecruitment']);



// Route des pages standart
Route::get('messages', function () {
    return view('messages');
});

Route::get('/formation-tresses', function () {
    return view('formation-tresses');
})->name('formation-tresses');

Route::get('/besoin-dune-pro', function () {
    return view('besoin-dune-pro');
})->name('besoin-dune-pro');

Route::get('/besoin-dune-pro', function () {
    return view('besoin-dune-pro');
})->name('besoin-dune-pro');

Route::get('/mon-manga', function () {
    return view('mon-manga');
})->name('mon-manga');

Route::get('/capillaire', function () {
    return view('capillaire');
})->name('capillaire');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/civilite', function () {
    return view('civilite-user');
})->name('civilite');

Route::get('/dashboard/mes-cours', function () {
    return view('/dashboard/mes-cours');
})->name('dashboard/mes-cours');

/*Route::get('/dashboard/mes-reservations', function () {
    return view('/dashboard/mes-reservations');
})->name('dashboard/mes-reservations');*/


Route::get('/dashboard/tableau-de-bord', function () {
    return view('/dashboard/tableau-de-bord');
})->name('dashboard/tableau-de-bord');


Route::get('/dashboard/mes-favoris', function () {
    return view('/dashboard/mes-favoris');
})->name('dashboard/mes-favoris');


Route::get('/dashboard/mes-messages', function () {
    return view('/dashboard/mes-messages');
})->name('dashboard/mes-messages');