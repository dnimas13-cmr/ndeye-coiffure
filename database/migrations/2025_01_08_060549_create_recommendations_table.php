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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barbers')->constrained('barbers');
            $table->text('mission_title');
            $table->longtext('mission_description')->nullable();;
            $table->text('mission_image')->nullable();;
            $table->text('person_name')->nullable();;
            $table->dateTime('mission_realisation_date')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
