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
            $table->foreign('id_customers')->references('id')->on('users')->onDelete('cascade'); // Suppression en cascade
            $table->foreignId('id_hairstyles')->constrained('hairstyles');
            $table->foreignId('id_barbers')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->time('appointment_start_time');
            $table->time('appointment_end_time');
            $table->text('appointment_adress');
            $table->string('type_adress',255);
            $table->string('person_type',255);
            $table->unsignedInteger('number_of_people_to_do_hair');
            $table->unsignedInteger('price');
            $table->string('status',255)->nullable();;
            $table->string('selected_profile',255)->nullable();
            $table->string('rejected_profile',255)->nullable();
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
