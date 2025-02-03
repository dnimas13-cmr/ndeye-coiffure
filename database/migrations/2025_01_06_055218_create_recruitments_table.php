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
            $table->foreign('id_babers')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_recruiters')->references('id')->on('users')->onDelete('cascade');
            $table->text('service_adress');
            $table->text('reason')->nullable();
            $table->float('location_distance',8,2)->nullable();;
            $table->date('day_of_service');
            $table->time('start_time');
            $table->time('end_time');
            $table->float('hourly_rate',8,2);
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
