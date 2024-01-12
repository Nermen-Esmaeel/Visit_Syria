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
        Schema::create('governorates-EN', function (Blueprint $table) {
            $table->id();
            $table->enum('governorates', 
            [
            'Aleppo',
            'Damascus',
            'Daraa',
            'Deir ez-Zor',
            'Hama',
            'Homs',
            'Idlib',
            'Latakia',
            'Quneitra',
            'Raqqa',
            'Rif Dimashq',
            'Tartus',
            'Al-Hasakah',
            'As-Suwayda'
            ]);

            $table->enum('governorates-AR',
            [
                'حلب',
                'دمشق',
                'درعا',
                'دير الزور',
                'حماة',
                'حمص',
                'إدلب',
                'اللاذقية',
                'القنيطرة',
                'الرقة',
                'ريف دمشق',
                'طرطوس',
                'الحسكة',
                'السويداء'
            ]);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('governorates');
    }
};
