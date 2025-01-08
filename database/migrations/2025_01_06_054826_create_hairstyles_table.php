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
        Schema::create('hairstyles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barbers')->constrained('barbers');
            $table->string('hairstyle_name',255);
            $table->unsignedInteger('hairstyle_price');
            $table->string('category');
            $table->unsignedInteger('realisation_time');
            $table->string('type_forfait');
            $table->string('type_classic');
            $table->text('hairstyle_photos');
            $table->text('hairstyle_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hairstyles');
    }
};
