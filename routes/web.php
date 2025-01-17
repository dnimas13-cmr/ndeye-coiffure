<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChoiseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\HairstylesController;
use App\Http\Controllers\DashboardAppointmentController;

Route::get('/', function () {
    return view('index');
});
//Route::get('/dashboard', [DashboardAppointmentController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
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

Route::get('choix-type-compte', [ChoiseController::class, 'viewerr'])->name('auth.choix-type-compte');
Route::post('choix-type-compte', [ChoiseController::class, 'creationsessionvar']);

Route::get('/appointments/partials/step1', [AppointmentsController::class, 'createStep1'])->name('appointments.partials.step1');
Route::post('/appointments/partials/step1', [AppointmentsController::class, 'postStep1']);
Route::get('/appointments/partials/step2', [AppointmentsController::class, 'createStep2'])->name('appointments.partials.step2');
Route::post('/appointments/partials/step2', [AppointmentsController::class, 'postStep2']);
Route::get('/appointments/partials/step3', [AppointmentsController::class, 'createStep3'])->name('appointments.partials.step3');
Route::post('/appointments/partials/step3', [AppointmentsController::class, 'postStep3']);
Route::get('/appointments/partials/step4', [AppointmentsController::class, 'createStep4'])->name('appointments.partials.step4');
Route::post('/appointments/partials/step4', [AppointmentsController::class, 'postStep4']);
Route::get('/appointments/partials/step5', [AppointmentsController::class, 'createStep5'])->name('appointments.partials.step5');
Route::post('/appointments/partials/step5', [AppointmentsController::class, 'postStep5']);
//Route::get('/appointments/partials/step6', [AppointmentsController::class, 'createStep6'])->name('appointments.partials.step6');
Route::get('/appointments/partials/step6', [HairstylesController::class, 'createStep6'])->name('appointments.partials.step6');
Route::post('/appointments/partials/step6', [AppointmentsController::class, 'postStep6']);
Route::get('/appointments/review', [AppointmentsController::class, 'review'])->name('appointments.review');
Route::post('/appointments/store', [AppointmentsController::class, 'store'])->name('appointments.store');

Route::get('/appointment-process', [AppointmentsController::class, 'traitmentappointment'])->name('appointment.process');
Route::post('/appointments/review', [AppointmentsController::class, 'traitmentappointment']);

// dashboard affichage
Route::get('/dashboard-appointments', [DashboardAppointmentController::class, 'appointmentlink'])->name('dashboard-appointment');
Route::get('/details-appointment/{id}', [DashboardAppointmentController::class, 'details'])->name('details-appointment');
Route::get('/validate-appointment/{id}', [AppointmentsController::class, 'updateStatus'])->name('validate-appointment');