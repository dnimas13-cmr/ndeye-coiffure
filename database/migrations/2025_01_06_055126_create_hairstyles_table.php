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
            $table->id_hairdresser();
            $table->hairstyle_name();
            $table->hairstyle_price();
            $table->category();
            $table->realisation_time();
            $table->type_forfait();
            $table->type_classic();
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
