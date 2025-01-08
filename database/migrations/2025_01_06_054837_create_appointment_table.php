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
            $table->foreignId('id_customers')->constrained('customers');
            $table->foreignId('id_hairstyles')->constrained('hairstyles');
            $table->foreignId('id_barbers')->constrained('barbers');
            $table->datetime('appointment_start_time');
            $table->datetime('appointment_end_time');
            $table->text('appointment_adress');
            $table->string('type_adress',255);
            $table->string('person_type',255);
            $table->unsignedInteger('number_of_people_to_do_hair');
            $table->unsignedInteger('price');
            $table->string('status',255);
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
