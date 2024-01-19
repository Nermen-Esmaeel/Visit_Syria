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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->string('photo_cover');
            $table->string('photo_logo');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('rating');
            $table->text('description_en');
            $table->text('description_ar');
            $table->enum('rooms_en', ['For one', 'For tow people','Suite']);
            $table->enum('rooms_ar', ['لشخص واحد', 'لشخصين','جناح عائلي']);
            $table->enum('discounts', ['20%', '40%','50%']);
            $table->integer('phone number');
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();
            $table->enum('working_time', ['24/24', '16/24'])->default('24/24');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
