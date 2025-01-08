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
        Schema::create('availabilitys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barbers')->constrained('barbers');
            $table->unsignedInteger('day_of_week');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilitys');
    }
};
