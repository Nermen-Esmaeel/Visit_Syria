<?php

namespace Database\Seeders;

use App\Models\StaticInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminID = 1;
        $picture_name = 'Landing';
        $content_title_en = [null,'wonderful nature','History and cultures','monuments','General title','Blog'];
        $content_title_ar = [null,'طبيعة ساحرة','التاريخ والحضارات','آثار ومعالم','نبذة عامة','المدونة'];
        $content_en = [null,null,null,null,'sdfjlk fsdjf is df sidf ou  fosif nj sfdiof os dfkjsdyf sdfy sdof isdfisdfisodf iosd jflisd flsd ufoisdhfsdf ','Sdfkk s f eritp erpt lmte rtoepo wer  fgdoi nbvc osie rlfjvs cx; enrlups fpsdf snfiu ewr sdhiosd fshr ios fdfisd  sdu  sof sdfuoisd fosdfilsd'];
        $content_ar = [null,null,null,null,'سايبعه اعسي  ؤسثغق  يؤ اسهع سبهعغ  لا تناسيبا سيبسبسيهخبعثهق ب سي بباهعسي بسي بسي بسي هخب خسي بسي ب','ستمبسيتب سيهب هخسي بخهسي بسيخحبت سيهبخسي هبتسيهابتنا ثق صهم سيهبهسي بهسيب كم ت هي بختسهبع حخصث قهمم رررنهخصب ستب'];
        $photos = 'photo path'  ;
        $is_wallpaper = true;
        $page = 1;
        $type = [null,'paginate','paginate','paginate','first_paragraph','second_paragraph'];

        for ($i=0; $i < 6; $i++) { 
            $static = new StaticInformation();
            $static->admin_id = $adminID;
            $static->picture_name = $picture_name;
            $static->content_title_en = $content_title_en[$i];
            $static->content_title_ar = $content_title_ar[$i];
            $static->content_en = $content_en[$i];
            $static->content_ar = $content_ar[$i];
            $static->photos = $photos;
            $static->is_wallpaper = $is_wallpaper;
            $static->page = $page;
            $static->type = $type[$i];
            $static->save();
        }
      }
}
