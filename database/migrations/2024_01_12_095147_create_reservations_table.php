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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('phone number');
            $table->string('full name');
            $table->string('email');
            $table->date('Entry timing');
            $table->date('Exit timing');
            $table->integer('number of guests');
            $table->enum('rooms-EN', ['For one', 'For tow people','Suite']);
            $table->enum('rooms-AR', ['لشخص واحد', 'لشخصين','جناح عائلي']);
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
