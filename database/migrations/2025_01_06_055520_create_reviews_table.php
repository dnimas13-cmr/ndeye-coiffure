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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_customers')->constrained('customers');
            $table->foreignId('id_barbers')->constrained('barbers');
            $table->text('messages');
            $table->datetime('review_date')->nullable();;
            $table->string('reviews_type')->nullable();;
            $table->unsignedInteger('number_stars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
