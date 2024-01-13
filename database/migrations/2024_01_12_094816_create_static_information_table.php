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
            $table->string('content_title_en')->nullable();
            $table->string('content_title_ar')->nullable();
            $table->string('content_en')->nullable();
            $table->string('content_ar')->nullable();
            $table->string('photos')->nullable();
            $table->boolean('is wallpaper');
            $table->enum('type', [
                'landing page',
                'blogs',
                'explore-hotels',
                'explore-restaurants',
                'explore-tourist sites',
                'recommendations-hotels',
                'recommendations-restaurants',
                'recommendations-Resorts',
                'recommendations-natural sites',
                'recommendations-historical sites',
                'blogs-history',
                'blogs-monuments',
                'blogs-Civilizations',
                'blogs-nature',
                'blogs-tourism',
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
