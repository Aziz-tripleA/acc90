<?php

namespace Database\Seeders;

use App\Models\Writer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table((new \App\Models\Writer())->getTable())->truncate();
        $writers = array(
            array('id' => '1','name' => 'شيرين أبو النجا' ),
            array('id' => '2','name' => 'مشير سمير' ),
            array('id' => '3','name' => 'الأب هنري نوُوين' ),
            array('id' => '4','name' => 'جبران خليل جبران' ),
            array('id' => '5','name' => 'الأم تريزا' ),
            array('id' => '6','name' => 'د. بول تورنييه' ),
            array('id' => '8','name' => 'د. نوال السعداوي' ),
            array('id' => '9','name' => 'آرثر كندال' ),
            array('id' => '10','name' => 'الأب هنري بولاد' ),
            array('id' => '11','name' => 'أوزوالد تشيمبرز'   ),
            array('id' => '12','name' => 'الأب جان باول اليسوعي' ),
            array('id' => '13','name' => 'د. كريستوف أندريه' ),
            array('id' => '14','name' => 'د. بيسل فان دير كوك' ),
            array('id' => '15','name' => 'مقتبسة من الإنترنت' ),
            array('id' => '16','name' => 'د. ماهر محمود عمر' ),
            array('id' => '17','name' => 'اعماق مريم' ),
            array('id' => '18','name' => 'بروفيسور/ ر. كريس فرالي' ),
            array('id' => '19','name' => 'د. ديان بول هيلر' ),
            array('id' => '20','name' => 'ستوفال ماكلاو,ماري دوزيير' ),
            array('id' => '21','name' => 'سامح سليمان' ),
            array('id' => '22','name' => 'د. مصطفى حجازي' ),
            array('id' => '23','name' => 'د. جينيفر سويتون' ),
            array('id' => '24','name' => 'فلورانس ويليامز' ),
            array('id' => '25','name' => 'امجد اسحق' ),
            array('id' => '28','name' => 'E.T.N' ),
            array('id' => '29','name' => 'Karam yousif' ),
            array('id' => '31','name' => 'Myriam' ),
            array('id' => '32','name' => 'Sameh Makram' ),
            array('id' => '33','name' => 'ألفريد أدلر' ),
            array('id' => '37','name' => 'بنت إسمها ...' ),
            array('id' => '38','name' => 'د. بول كولمان' ),
            array('id' => '39','name' => 'د. سامي فوزي' ),
            array('id' => '40','name' => 'د. سوزان نيومان' ),
            array('id' => '42','name' => 'د. فيكتور فرانكل' ),
            array('id' => '43','name' => 'د. لاري كراب' ),
            array('id' => '45','name' => 'د. ماري كالديرون، د. جيمس رامي' ),
            array('id' => '46','name' => 'د. ماهر الضبع' ),
            array('id' => '47','name' => 'د. ماهر محمود عمر' ),
            array('id' => '48','name' => 'د. نبيل علي' ),
            array('id' => '50','name' => 'د. هاريت ب. بريكر' ),
            array('id' => '51','name' => 'د. هاييم جينو' ),
            array('id' => '52','name' => 'د. هشام شرابي' ),
            array('id' => '53','name' => 'د. هنري كلود، د. جون تاونسند' ),
            array('id' => '54','name' => 'د. جيرى وايكوف و بربارة يونل' ),
            array('id' => '55','name' => 'دعاء عياد' ),
            array('id' => '57','name' => 'دكتور أحمد عكاشة' ),
            array('id' => '58','name' => 'دوستوفسكي' ),
            array('id' => '59','name' => 'دولورس إم. براون' ),
            array('id' => '60','name' => 'ديتريش (ديتريك) بونهوفر' ),
            array('id' => '61','name' => 'ديفيد عادل صادق' ),
            array('id' => '62','name' => 'ديفيد نشأت' ),
            array('id' => '63','name' => 'ديوك ربنسون' ),
            array('id' => '64','name' => 'رامى وجيه يعقوب مينا' ),
            array('id' => '65','name' => 'رانجيت سينج مالهي، روبرت دبليو ريزنر' ),
            array('id' => '66','name' => 'روجرز بالمز' ),
            array('id' => '67','name' => 'روللو ماي' ),
            array('id' => '68','name' => 'رولو ماي  - إرفين يالوم'  ),
            array('id' => '69','name' => 'زاك بونين' ),
            array('id' => '70','name' => 'سارة إيوينج' ),
            array('id' => '71','name' => 'الأب أنتوني م. كونياريس' ),
            array('id' => '72','name' => 'الأب بيتر ج. فان بريمن'  ),
            array('id' => '75','name' => 'الأب بيتر ج. فان بريمن اليسوعي'  ),
            array('id' => '76','name' => 'الأب سارافيم البراموسي' ),
            array('id' => '77','name' => 'الأب متى المسكين'  ),
            array('id' => '80','name' => 'الأب هنري نووين'  ),
            array('id' => '82','name' => 'المجهولة'  ),
            array('id' => '83','name' => 'basbosa'  ),
            array('id' => '84','name' => 'BPs'  ),
            array('id' => '85','name' => 'Dr. Samy Fawzy'  ),
            array('id' => '86','name' => 'Emad Al Hawary' ),
            array('id' => '87','name' => 'Eman Bahig'  ),
            array('id' => '88','name' => 'fahed jamal'  ),
            array('id' => '89','name' => 'George W.Ishak'  ),
            array('id' => '91','name' => 'J. G. D, USA' ),
            array('id' => '94','name' => 'Jesus child' ),
            array('id' => '95','name' => 'Karin' ),
            array('id' => '96','name' => 'KJ' ),
            array('id' => '97','name' => 'martha' ),
            array('id' => '98','name' => 'me:' ),
            array('id' => '99','name' => 'Safrota' ),
            array('id' => '100','name' => 'Samah'  ),
            array('id' => '102','name' => 'Sara'  ),
            array('id' => '103','name' => 'The Beautified' ),
            array('id' => '105','name' => 'آرثر بينيك' ),
            array('id' => '106','name' => 'آرثر كندال' ),
            array('id' => '108','name' => 'أرون بك' ),
            array('id' => '109','name' => 'أزوالد تشيمبرز' ),
            array('id' => '110','name' => 'أشرف فلتس' ),
            array('id' => '114','name' => 'أكثر من كاتب' ),
            array('id' => '115','name' => 'ألفرد أدلر'),
            array('id' => '116','name' => 'أمال جورج' ),
            array('id' => '117','name' => 'أمل سمير' ),
            array('id' => '118','name' => 'أنتوني كامبولو'  ),
            array('id' => '119','name' => 'أوستن فيليبس' ),
            array('id' => '120','name' => 'إ. ع.' ),
            array('id' => '121','name' => 'إديل فابر، وإلين مازليش' ),
            array('id' => '122','name' => 'مشير سمير - متى هنري' ),
            array('id' => '124','name' => 'مشير سمير - وليام كِيروان' ),
            array('id' => '125','name' => 'مقتبسة من موسوعة ويكيبيديا' ),
            array('id' => '126','name' => 'من أخبار الحوادث بجريدة الأهرام المصرية'  ),
            array('id' => '127','name' => 'من أعماق نفس تتغير'  ),
            array('id' => '129','name' => 'من وثائق تجارب علم النفس' ),
            array('id' => '130','name' => 'منى يعقوب' ),
            array('id' => '131','name' => 'مودي سمير' ),
            array('id' => '132','name' => 'مينا طوسون' ),
            array('id' => '133','name' => 'مينا ميشيل ل. يوسف'  ),
            array('id' => '134','name' => 'ن. م.' ),
            array('id' => '135','name' => 'نادين البدير' ),
            array('id' => '136','name' => 'نسرين' ),
            array('id' => '137','name' => 'نيفين ممدوح' ),
            array('id' => '140','name' => 'هـ. و.' ),
            array('id' => '141','name' => 'هاني روماني' ),
            array('id' => '142','name' => 'هنري نووين وآخرين'  ),
            array('id' => '143','name' => 'هنري نووين/ جبران خليل جبران' ),
            array('id' => '144','name' => 'هوارد كلاينبل' ),
            array('id' => '145','name' => 'وتشمان ني' ),
            array('id' => '146','name' => 'وجيه عطا' ),
            array('id' => '147','name' => 'وليم ماكدونالد' ),
            array('id' => '148','name' => 'ويم ريتكيرك' ),
            array('id' => '149','name' => 'يوديجيت باتاشارهي' ),
            array('id' => '150','name' => 'يوسف إدريس' ),
            array('id' => '151','name' => 'إنجي' ),
            array('id' => '154','name' => 'إيان ستيوارت، و فان جوينز' ),
            array('id' => '155','name' => 'إيرك فروم' ),
            array('id' => '156','name' => 'إيريني لطيف' ),
            array('id' => '159','name' => 'إيزاك  م. ماركس' ),
            array('id' => '161','name' => 'إيلان جلوم' ),
            array('id' => '162','name' => 'إيمي مدحت' ),
            array('id' => '164','name' => 'إيناس عزت' ),
            array('id' => '165','name' => 'ابتسام عدلى' ),
            array('id' => '167','name' => 'اشرف فلتس' ),
            array('id' => '168','name' => 'الأم باسيليا شلينك'  ),
            array('id' => '169','name' => 'القديس أغسطينوس' ),
            array('id' => '170','name' => 'القديس توما الكمبيسي' ),
            array('id' => '171','name' => 'القديسة تريزا الأفيلّية' ),
            array('id' => '172','name' => 'القس جون بايبر' ),
            array('id' => '174','name' => 'بنت يسوع' ),
            array('id' => '175','name' => 'بنيغنُس أورورك الأغسطيني'),
            array('id' => '176','name' => 'بول تيلك' ),
            array('id' => '178','name' => 'تشارلز ستانلي'  ),
            array('id' => '179','name' => 'تشارلز فني'  ),
            array('id' => '180','name' => 'أميرة صالح' ),
            array('id' => '181','name' => 'توماس كيلي' ),
            array('id' => '184','name' => 'ج. أ. باكر' ),
            array('id' => '185','name' => 'ج. أ. ك.' ),
            array('id' => '187','name' => 'ج. د.' ),
            array('id' => '190','name' => 'جاستون بلاشر، ومارتن بوبر' ),
            array('id' => '191','name' => 'جاكي' ),
            array('id' => '192','name' => 'جان م . دريشر' ),
            array('id' => '193','name' => 'جاي أدامز'  ),
            array('id' => '198','name' => 'جبران خليل جبران، الأم تريزا' ),
            array('id' => '200','name' => 'جبران خليل جبران/ سوفوكليس' ),
            array('id' => '201','name' => 'جوزيف وكارولين مسينجر' ),
            array('id' => '202','name' => 'جوليا توجندات' ),
            array('id' => '203','name' => 'جون باولبي'),
            array('id' => '204','name' => 'جون د. تانجلدر' ),
            array('id' => '205','name' => 'جون ر. ستوت' ),
            array('id' => '206','name' => 'جون ماكأرثر'  ),
            array('id' => '209','name' => 'جى. آي. باكر' ),
            array('id' => '210','name' => 'جي. سي. رايلي' ),
            array('id' => '211','name' => 'جيري سموللي' ),
            array('id' => '212','name' => 'خادم مكرس' ),
            array('id' => '213','name' => 'خطاب وثائقي لمارتن فإن بريد – محافظ نيويورك' ),
            array('id' => '214','name' => 'د. خالد منتصر' ),
            array('id' => '215','name' => 'د. دان مونتغمري' ),
            array('id' => '216','name' => 'د. ريتشارد ل. برات' ),
            array('id' => '217','name' => 'سكوت ليلينفيلد - ستيفين جاى لين - جون روشيو - باري يايرستاين' ),
            array('id' => '218','name' => 'سمير أمين' ),
            array('id' => '219','name' => 'سوزي لطفي' ),
            array('id' => '220','name' => 'سي. إس. لويس' ),
            array('id' => '221','name' => 'سيلفيا وجدي' ),
            array('id' => '222','name' => 'شادى' ),
            array('id' => '223','name' => 'شغل عقلك' ),
            array('id' => '224','name' => 'عادل السنهورى' ),
            array('id' => '227','name' => 'عبد الله القصيمي' ),
            array('id' => '228','name' => 'عماد عاطف' ),
            array('id' => '229','name' => 'ق. فايز فارس' ),
            array('id' => '230','name' => 'كاتب غير معروف' ),
            array('id' => '231','name' => 'كارل أ. كيللر' ),
            array('id' => '232','name' => 'كارولين يورد' ),
            array('id' => '233','name' => 'لورانس كراب' ),
            array('id' => '234','name' => 'م-ف-مصر' ),
            array('id' => '235','name' => 'ماثيو جالاتين' ),
            array('id' => '236','name' => 'ماجد نصري - مصر' ),
            array('id' => '237','name' => 'مارتن سليجمان' ),
            array('id' => '238','name' => 'ماري' ),
            array('id' => '239','name' => 'ماري شحاتة'   ),
            array('id' => '240','name' => 'مارينا كراكوفسكي'   ),
            array('id' => '242','name' => 'مايكل مكرم'  ),
            array('id' => '243','name' => 'مايكل نادر'  ),
            array('id' => '244','name' => 'مايكل ويلكوك'  ),
            array('id' => '246','name' => 'متألمة'   ),
            array('id' => '247','name' => 'متى هنري'  ),
            array('id' => '248','name' => 'مجدي فكري'  ),
            array('id' => '249','name' => 'مريم' ),
            array('id' => '251','name' => 'د. ألبرت إيلليس' ),
            array('id' => '252','name' => 'د. ألبرت جيه. برنشتين' ),
            array('id' => '253','name' => 'د. أودري ريكر، د. كارولين كراودر' ),
            array('id' => '254','name' => 'د. السيد علي سيد أحمد و د. فائقة محمد بدر' ),
            array('id' => '255','name' => 'د. برينيه براون' ),
            array('id' => '256','name' => 'د. بول ج. كارام' ),
            array('id' => '257','name' => 'د. جون جراي' ),
            array('id' => '259','name' => 'مريم ميلاد' ),
            array('id' => '260','name' => 'هنري فيلكلر' ),
            array('id' => '261','name' => 'هنري كلاود، جون تونسند' ),
     
            array('id' => '280','name' => 'أ. و. توزر' ),
           
            array('id' => '283','name' => 'إريك فروم' ),
         
            array('id' => '287','name' => 'متى المسكين' ),
            
            array('id' => '331','name' => 'أنطوني ستور' ),
       
            array('id' => '345','name' => 'بول تورنييه' ),
           
            array('id' => '432','name' => 'جون كالفن' ),
           
            array('id' => '448','name' => 'جيرالد ماكديرمت' ),
            array('id' => '449','name' => 'جيري بريدجز' ),
           
            array('id' => '465','name' => 'خوان ارياس' ),
            
            array('id' => '503','name' => 'هشام شرابي' ),
            
            array('id' => '508','name' => 'إمام عبد الفتاح إمام' ),
            
            array('id' => '516','name' => 'توماس أ. هاريس' ),
           
            array('id' => '522','name' => 'جيمس دوبسون' ),
            
            array('id' => '541','name' => 'عبد الستار إبراهيم' ),
            
            array('id' => '548','name' => 'كارل روجرز' ),
            
            array('id' => '581','name' => 'جون جراي' ),
      
            array('id' => '584','name' => 'روس كامبل' ),
            
            array('id' => '659','name' => 'ديفيد أ. وولف' ),
            
            array('id' => '699','name' => 'ريك وارين' ),
           
            array('id' => '745','name' => 'ف. ب. ماير' ),
            
            array('id' => '766','name' => 'فيليب يانسي' ),
            
            array('id' => '819','name' => 'كوستي بندلي' ),
            
            array('id' => '827','name' => 'لاري كراب' ),
            
            array('id' => '924','name' => 'هيلين روس' ),
            
            array('id' => '955','name' => 'جوناثان إدواردز' ),
            
            array('id' => '1142','name' => 'جوديث بيك'   ),
            
            array('id' => '1170','name' => 'موريس كرانستون'   ),
           
            array('id' => '1191','name' => 'عماد ميشيل'   ),
            
            array('id' => '1322','name' => 'سورين كيركجارد'   ),
            
            array('id' => '1342','name' => 'بيير داكو'   ),
            
            array('id' => '1347','name' => 'بليز باسكال'   ),
            
            array('id' => '1394','name' => 'أجيث فرناندو'   ),
            
            array('id' => '1427','name' => 'ريتشارد فوستر'   ),
            
            array('id' => '1478','name' => 'ريتشارد تمبلر'  ),
            
            array('id' => '1519','name' => 'جيرالد هوتر'  ),
            
            array('id' => '1543','name' => 'رالف فيننج'  ),
            
            array('id' => '1568','name' => 'ديفيد هنري ثورو'  ),
           
            array('id' => '1606','name' => 'سارافيم البرموسي'   ),
            
            array('id' => '1659','name' => 'ميلفين تينكر'   ),
           
            array('id' => '1687','name' => 'جاري كولينز' ),
            array('id' => '1688','name' => 'تيموثي جونز'  ),
            
            
        );
          
        foreach($writers as $writer){
            writer::create($writer);
        }
    }
}
