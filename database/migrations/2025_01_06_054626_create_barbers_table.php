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
        Schema::create('barbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained('users');
            $table->string('listformation')->nullable();
            $table->string('listkills')->nullable();
            $table->string('listhairstyles')->nullable();
            $table->longtext('bibliography')->nullable();
            $table->unsignedInteger('year_of_experience')->nullable();
            $table->unsignedInteger('reponse_time')->nullable();
            $table->unsignedInteger('mission_acceptance_rate')->nullable();
            $table->unsignedInteger('positive_reviews')->nullable();
            $table->string('cni_photo')->nullable();
            $table->float('performance_score',8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barbers');
    }
};
