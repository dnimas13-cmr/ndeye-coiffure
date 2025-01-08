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
            $table->string('account_type',255);
            $table->string('listformation');
            $table->string('listkill');
            $table->string('list_hairstyle');
            $table->longtext('bibliography');
            $table->unsignedInteger('year_of_experience');
            $table->unsignedInteger('reponse_time');
            $table->unsignedInteger('mission_acceptance_rate');
            $table->unsignedInteger('positive_reviews');
            $table->string('cni_photo')->nullable();
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
