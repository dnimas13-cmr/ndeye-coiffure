<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Verify that the user ID exists
         $userExists = User::where('id', $id_user)->exists();

         if (!$userExists) {
             return response()->json(['error' => 'User not found'], 404);
         }
 
         // Use a transaction to ensure data integrity
         $barber = DB::transaction(function () use ($id_user) {
             return Customer::create([
                 'id_users' => $id_user,
                 // Omitting nullable fields or setting them to null explicitly
                 'listformation' => null,
                 'listkill' => null,
                 'list_hairstyle' => null,
                 'bibliography' => null,
                 'year_of_experience' => null,
                 'reponse_time' => null,
                 'mission_acceptance_rate' => null,
                 'positive_reviews' => null,
                 'cni_photo' => null,
             ]);
         });
 
         return response()->json(['message' => 'Barber successfully created', 'barber' => $barber], 201);
     }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
