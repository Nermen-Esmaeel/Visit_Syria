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
        Schema::create('static_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            $table->string('picture_name');
            $table->enum('category', [
                'Tourism',
                'Natural',
                'Civilizations',
                'Archaeology',
                'History'
                ])->nullable();
            $table->enum('type', ['first_paragraph', 'second_paragraph','paginate'])->nullable();
            $table->string('content_title_en')->nullable();
            $table->string('content_title_ar')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_ar')->nullable();
            $table->string('photos')->nullable();
            $table->boolean('is_wallpaper')->default(false);
            $table->enum('layout', [
                'landing_page',
                'blogs_Natural',
                'blogs_Archaeology',
                'explore_hotels',
                'explore_restaurants',
                'explore_tourist_sites',
                'recommendations_hotels',
                'recommendations_restaurants',
                'recommendations_Resorts',
                'recommendations_natural_sites',
                'recommendations_historical_sites',
                'about_history',
                'about_monuments',
                'about_Civilizations',
                'about_nature',
                'about_tourism',
                ])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_information');
    }
};
