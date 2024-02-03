<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_id          =    1;
        $category           =    [2,1,5,4,3];
        $title_en          =   ['About nature','About Tourism','About History','About Monuments','About Civilizations',] ;
        $title_ar          =   ['نبذة عن الطبيعة','نبذة عن السياحة ','نبذة تاريخية','نبذة عن الآثار','نبذة عن الحضارات'] ;
        $content_en        =   'Syria enjoys stunning natural diversity, as it is located at the crossroads between the continents of Asia and Africa, making it home to many different terrains, including mountains, valleys, plains, deserts, and beaches.  It also includes many landmarks

        The distinctive nature, which attracts tourists from all over the world.
       
        Among the most important natural landmarks in Syria are the following:
       
        .  Syrian Coast Mountains: They are located along the Syrian coast, extending from the city of Latakia to the city of Tartous.  These mountains are distinguished by their high altitude, stunning views, and moderate climate.  Among the most famous mountains of the Syrian coast are Jabal al-Sheikh, Jabal al-Druze, and Jabal al-Druze
       
        Punching.
       
        .  The Qalamoun Mountains are located in northwestern Syria, extending from the city of Damascus to the city of Aleppo.  These mountains are characterized by their mountainous nature
       
        Rugged and dense forests.  Among the most famous mountains of Qalamoun are Mount Qasioun, Mount Prophet Matthew, and Mount Sumac.
       
        .  The Syrian Desert is located in eastern Syria, and extends to the Iraqi border.  This desert is characterized by its dry nature and its dunes
       
        Sandstone and its ancient ruins.  Among the most famous areas of the Syrian desert are the Palmyra region and the Deir ez-Zor region.
       
        .  The Syrian beaches extend along the Mediterranean coast, and are about 190 kilometers long.  These beaches are distinguished by their clear blue waters and soft white sand.  One of the most famous beaches in Syria is the white sand beach in
       
        Tartous, Al-Mina Beach in Latakia, and Al-Sahel Beach in Homs';
        $content_ar        =    'تتمتع سوريا بتنوع طبيعي خلاب، حيث تقع على مفترق طرق بين قارتي آسيا وأفريقيا، مما جعلها موطنا للعديد من التضاريس المختلفة، بما في ذلك الجبال والوديان، والسهول والصحاري، والشواطئ. كما أنها تضم العديد من المعالم

        الطبيعية المميزة، والتي تجذب السياح من جميع أنحاء العالم.
        
        ومن أهم المعالم الطبيعية في سوريا ما يلي:
        
        . جبال الساحل السوري: تقع على طول الساحل السوري، وتمتد من مدينة اللاذقية إلى مدينة طرطوس. تتميز هذه الجبال بارتفاعها الشاهق، ومناظرها الخلابة، ومناخها المعتدل. ومن أشهر جبال الساحل السوري جبل الشيخ، وجبل الدروز، وجبل
        
        اللكام.
        
        . جبال القلمون تقع في شمال غرب سوريا، وتمتد من مدينة دمشق إلى مدينة حلب. تتميز هذه الجبال بطبيعتها الجبلية
        
        الوعرة، وغاباتها الكثيفة. ومن أشهر جبال القلمون جبل قاسيون، وجبل النبي متى، وجبل السماق.
        
        . الصحراء السورية تقع في شرق سوريا، وتمتد إلى الحدود العراقية. تتميز هذه الصحراء بطبيعتها الجافة، وكثبانها
        
        الرملية، وآثارها القديمة. ومن أشهر مناطق الصحراء السورية منطقة تدمر، ومنطقة دير الزور.
        
        . الشواطئ السورية تمتد على طول ساحل البحر الأبيض المتوسط، ويبلغ طولها حوالي 190 كيلومترًا. تتميز هذه الشواطئ بمياهها الزرقاء الصافية، ورمالها البيضاء الناعمة. ومن أشهر شواطئ سوريا شاطئ الرمال البيضاء في
        
        طرطوس، وشاطئ الميناء في اللاذقية، وشاطئ الساحل في حمص';

        for($i=0; $i<5;$i++) {
            $rate=new About();
            $rate->admin_id     =    $admin_id;
            $rate->category     =    $category[$i];
            $rate->title_en     =    $title_en[$i];
            $rate->title_ar     =    $title_ar[$i];
            $rate->content_en   =    $content_en;
            $rate->content_ar   =    $content_ar;
        
           
            $rate->save();
        }
    }
}
