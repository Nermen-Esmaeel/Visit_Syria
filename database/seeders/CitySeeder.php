<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [ 'Aleppo','Damascus','Daraa','Deir ez-Zor','Hama','Homs','Idlib','Latakia','Quneitra','Raqqa','Rif Dimashq','Tartus','Al-Hasakah','As-Suwayda'];
        $governorates_AR=[ 'حلب','دمشق','درعا','دير الزور','حماة','حمص','إدلب','اللاذقية','القنيطرة','الرقة','ريف دمشق','طرطوس','الحسكة','السويداء'];
        for($i=0; $i<14;$i++) {
            $city=new city();
            $city->governorates = $governorates[$i];
            $city->governorates_AR = $governorates_AR[$i];
            $city->save();
        }
    }
}
