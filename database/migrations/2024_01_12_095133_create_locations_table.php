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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->nullable()->constrained('hotels')->cascadeOnDelete();
            $table->foreignId('restaurant_id')->nullable()->constrained('restaurants')->cascadeOnDelete();
            $table->foreignId('site_id')->nullable()->constrained('tourist_sites')->cascadeOnDelete();
            $table->foreignId('blog_id')->nullable()->constrained('blogs')->cascadeOnDelete();
            $table->string('street_en');
            $table->string('street_ar');
            $table->string('city_en');
            $table->string('city_ar');
            $table->string('governorate_en');
            $table->string('governorate_ar');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
