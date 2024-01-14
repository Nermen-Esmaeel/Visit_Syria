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
            $table->integer('phone_number');
            $table->string('full_name');
            $table->string('email');
            $table->date('entry_timing');
            $table->date('exit_timing');
            $table->integer('number_of_guests');
            $table->enum('rooms', ['For one', 'For tow people','Suite','لشخص واحد', 'لشخصين','جناح عائلي']);
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
