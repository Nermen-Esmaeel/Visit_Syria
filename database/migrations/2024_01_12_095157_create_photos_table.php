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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->morphs('photoable');
            $table->string('photos');
            $table->enum('type-EN', [
                'cover',
                'logo', 
                'hotel photos',
                'reservation photos',
                'menu', 
                'blog photos',
                'tourist site photos',
                'static photo']);
                $table->enum('type-AR', [
                    'صورة غلاف',
                    'لوغو', 
                    'صور الفندق',
                    'صور الحجز',
                    'قائمة الطعام', 
                    'صور المقالة',
                    'صور الأماكن السياحية',
                    'صور ستاتيكية'
                ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
