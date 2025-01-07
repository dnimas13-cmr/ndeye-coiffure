<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->id_custommer();
            $table->id_hairstyle();
            $table->appointment_date();
            $table->appointment_hour();
            $table->appointment_adress();
            $table->appointment_hairstyle();
            $table->type_adress();
            $table->person_type();
            $table->number_people();
            $table->price();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
