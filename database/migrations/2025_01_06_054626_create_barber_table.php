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
            $table->foreignId('id_user')->constrained();
            $table->unsignedInteger('account_type');
            $table->availability();
            $table->string('listformation');
            $table->string('listkill');
            $table->string('list_hairstyle');
            $table->longtext('bibliography');
            $table->unsignedInteger('year_of_experience');
            $table->text('recommendations');
            $table->string('cni_photo');
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
