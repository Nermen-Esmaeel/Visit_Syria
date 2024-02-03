<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_id          =    1;
        $city_id           =    [1,1,2,2,3,3,4,4];
        $category          =    ['Archaeologic','Archaeologic','Natural','Natural','Archaeologic','Archaeologic','Natural','Natural'];
        $photo_cover       =    'cover path';
        $title_en          =   'Basra amphitheater' ;
        $title_ar          =   'مدرج بصرى' ;
        $content_en        =   'Bosra Amphitheater is a Roman amphitheater located in the Syrian city of Bosra, and it is one of the most wonderful Roman amphitheaters in the world.  The amphitheater was built in the first century AD, and can accommodate 25,000 spectators.  The amphitheater is distinguished by its magnificent geometric design, as it consists of three floors and contains 186 white marble columns.  It also features a stunning view of the ancient city of Bosra.  The amphitheater has been used in the past for sporting celebrations, concerts and theatrical performances.  It has also been used as a place

        For public gatherings and religious celebrations.
       
        It is one of the most important tourist attractions in Syria, and is a symbol of Roman culture in the region.  The most important information about the runway
       
        Visual :
       
        .  The amphitheater was built in the first century AD.
       
        .  The amphitheater can accommodate 25,000 spectators.
       
        .  The amphitheater consists of three floors and contains 186 white marble columns.
       
        .  Bosra was included on the UNESCO World Heritage List in 1980.' ;
        $content_ar        =    'مدرج بصرى هي مدرج روماني يقع في مدينة بصرى السورية، وهي واحدة من أروع المدرجات الرومانية في العالم. تم بناء المدرج في القرن الأول الميلادي، ويتسع لـ 25 ألف متفرج. يتميز المدرج بتصميمه الهندسي الرائع، حيث يتكون من ثلاثة طوابق، ويحتوي على 186 عمودًا من الرخام الأبيض. كما يتميز أيضًا بإطلالته الخلابة على مدينة بصرى القديمة. تم استخدام المدرج في الماضي للاحتفالات الرياضية والحفلات الموسيقية والعروض المسرحية. وقد تم استخدامه أيضًا كمكان

        للتجمعات العامة والاحتفالات الدينية.
        
        وهي واحدة من أهم المعالم السياحية في سوريا، وتعد رمزا للثقافة الرومانية في المنطقة. أما أهم المعلومات عن مدرج
        
        بصري :
        
        . تم بناء المدرج في القرن الأول الميلادي.
        
        . يتسع المدرج لـ 25 ألف متفرج.
        
        . يتكون المدرج من ثلاثة طوابق، ويحتوي على 186 عمودًا من الرخام الأبيض.
        
        . تم إدراج مدرجة بصرى على قائمة التراث العالمي لليونسكو في عام 1980.';
      
        for($i=0; $i<8;$i++) {
            $rate=new Blog();
            $rate->admin_id     =    $admin_id;
            $rate->city_id      =    $city_id[$i];
            $rate->category     =    $category[$i];
            $rate->photo_cover  =    $photo_cover;
            $rate->title_en     =    $title_en;
            $rate->title_ar     =    $title_ar;
            $rate->content_en   =    $content_en;
            $rate->content_ar   =    $content_ar;
        
           
            $rate->save();
        }
    }
}
