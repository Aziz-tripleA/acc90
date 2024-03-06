<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table((new \App\Models\Translator())->getTable())->truncate();
        
        $categories = array(
            array('id' => '1','cat_name' => 'Inner Healing'  ),
            array('id' => '2','cat_name' => 'Marriage'  ),
            array('id' => '5','cat_name' => 'الحياة المسيحية'  ),
            array('id' => '6','cat_name' => 'Addiction'  ),
            array('id' => '7','cat_name' => 'Children Books'  ),
            array('id' => '8','cat_name' => 'Common Problems'  ),
            array('id' => '9','cat_name' => 'Counseling, Psychology & Psychiatry'  ),
            array('id' => '10','cat_name' => 'Family & Raising up children'  ),
            array('id' => '11','cat_name' => 'Journal of psychology and Christianity'  ),
            array('id' => '13','cat_name' => 'Other subjects'  ),
            array('id' => '15','cat_name' => 'Philosophy & Sociology'  ),
            array('id' => '16','cat_name' => 'References & Dictienaries Encyclopedias'  ),
            array('id' => '17','cat_name' => 'Sexual Problems'  ),
            array('id' => '18','cat_name' => 'Christian living'  ),
            array('id' => '19','cat_name' => 'Theology & Old Christian Literature'  ),
            array('id' => '21','cat_name' => 'أسرة وتربية'  ),
            array('id' => '22','cat_name' => 'موضوعات متنوعة'  ),
            array('id' => '23','cat_name' => 'اسطوانات مدمجة' ),
            array('id' => '26','cat_name' => 'الإدمان'  ),
            array('id' => '27','cat_name' => 'التفسير الحديث للكتاب المقدس'  ),
            array('id' => '28','cat_name' => 'التواصل والعلاقات '  ),
            array('id' => '30','cat_name' => 'الحياة مع الله'  ),
            array('id' => '31','cat_name' => 'الزواج '  ),
            array('id' => '34','cat_name' => 'المرأة'  ),
            array('id' => '37','cat_name' => 'تربية الأطفال'  ),
            array('id' => '40','cat_name' => 'ثقافة ومشكلات جنسية'  ),
            array('id' => '54','cat_name' => 'سلسلة  (كــن) '  ),
            array('id' => '55','cat_name' => 'سلسلة (جون وسلي) لتفسير الكتاب'  ),
            array('id' => '56','cat_name' => 'سلسلة (متى هنري) لتفسير الكتاب'  ),
            array('id' => '57','cat_name' => 'بيولوجي و نيرولوجي'  ),
            array('id' => '58','cat_name' => 'سلسلة الكتاب المقدس يتحدث اليوم'  ),
            array('id' => '59','cat_name' => 'سلسلة تفسير الكتاب المقدس'  ),
            array('id' => '60','cat_name' => 'سمات ومعايير النضج النفسي'  ),
            array('id' => '63','cat_name' => 'طب نفسي'  ),
            array('id' => '64','cat_name' => 'فلسفة و منطق وإجتماع'  ),
            array('id' => '69','cat_name' => 'كيف نفهم الطفل - سلسلة دراسات سيكولوجية'  ),
            array('id' => '71','cat_name' => 'لاهوت وتراث مسيحي ودراسات كتابية'  ),
            array('id' => '76','cat_name' => 'مشكلات شائعة'  ),
            array('id' => '98','cat_name' => 'تفاسير الأب تادرس يعقوب الملطي'  ),
            array('id' => '79','cat_name' => 'مشورة وعلم نفس'  ),
            array('id' => '99','cat_name' => '"سلسلة تفاسير" كنوز المعرفة'  ),
            array('id' => '88','cat_name' => 'شعر وأدب'  ),
            array('id' => '92','cat_name' => 'شروحات وتفاسير متنوعة للكتاب المقدس'  ),
            array('id' => '93','cat_name' => 'مراجع - للأطلاع الداخلي فقط'  ),
            array('id' => '94','cat_name' => 'Novels & Biographies'  ),
            array('id' => '95','cat_name' => 'سلسلة تفاسير الأب متي المسكين'  ),
            array('id' => '96','cat_name' => '  كتب للأطفال والشباب'  ),
            array('id' => '97','cat_name' => 'قصص سيكولوجية وسير ذاتية'  ),
            array('id' => '100','cat_name' => 'تفاسير جيل يقرأ إنجيل'  ),
            array('id' => '102','cat_name' => 'المشوره مع الأطفال والمراهقين'  ),
            array('id' => '103','cat_name' => 'توعية نفسية'  )
          );
          
        foreach($categories as $category){
            BookCategory::create($category);
        }
    }
}
