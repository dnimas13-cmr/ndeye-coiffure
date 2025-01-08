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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_babers')->constrained('barbers');
            $table->foreignId('id_recruiters')->constrained('recruiters');
            $table->text('service_adress');
            $table->float('location_distance',8,2);
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->unsignedInteger('service_price');
            $table->text('kills_wanted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
