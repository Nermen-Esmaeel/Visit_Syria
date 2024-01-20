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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->string('street_en');
            $table->string('street_ar');
            $table->string('city_en');
            $table->string('city_ar');
            $table->enum('category', [
                'Archaeologica',
                'Natural',
                ])->nullable();
            $table->string('photo_cover');
            $table->string('content_title_en');
            $table->string('content_title_ar');
            $table->longText('content_en');
            $table->longText('content_ar');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
