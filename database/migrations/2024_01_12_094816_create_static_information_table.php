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
            $table->string('picture name');
            $table->string('content_title-EN')->nullable();
            $table->string('content_title-AR')->nullable();
            $table->string('content-EN')->nullable();
            $table->string('content-AR')->nullable();
            $table->string('photos')->nullable();
            $table->boolean('is wallpaper');
            $table->enum('type-EN', [
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

                $table->enum('type-AR', [
                    'الصفحة الرئيسية',
                    'المقالات',
                    'استكشف الفنادق',
                    'استكشف المطاعم',
                    'استكشف المواقع السياحية',
                    'التوصيات-الفنادق',
                    'التوصيات-المطاعم',
                    'التوصيات-المنتجعات',
                    'التوصيات-المواقع الطبيعية',
                    'التوصيات-المعالم الأثرية',
                    'المقالات-التاريخ',
                    'المقالات-الآثار',
                    'المقالات-الحضارات',
                    'المقالات-الطبيعة',
                    'المقالات-السياحة',
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
