<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new \App\Models\ContactData())->getTable())->truncate();
        $config_data = [
            [
                'title' => 'العنوان',
                'value' => 'مبنى كنيسة النعمة الرسولية 19ش الوجوه، الترعة البولاقية، خلوصي. شبرا مصر',
                'order' => 1,
            ],
            [
                'title' => 'صندوق البريد',
                'value' => 'ص .ب 30 الأفضل - شبرا - القاهرة 11627، مصر',
                'order' => 2,
            ],
            [
                'title' => 'تليفون',
                'value' => '+2 02 223 80 165',
                'order' => 3,
            ],
            [
                'title' => 'موبايل وواتساب',
                'value' => '+2 0122 770 8916',
                'order' => 4,
            ],
            [
                'title' => 'مواعيد المكتب',
                'value' => 'من 10 - 2 ظهراً، 5 - 9 مساءاً',
                'order' => 5,
            ],
            [
                'title' => 'الإجازة الاسبوعية',
                'value' => 'السبت والأحد',
                'order' => 6,
            ], 
            [
                'title' => 'الموقع',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.6241312151064!2d31.24878871470541!3d30.076306724022515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458406356364adb%3A0x328f5707ddfe63c6!2z2YPZhtmK2LPYqSDYp9mE2YbYudmF2Kkg2KfZhNix2LPZiNmE2YrYqQ!5e0!3m2!1sen!2seg!4v1645283853953!5m2!1sen!2seg',
                'order' => 7,
            ],
            [
                'title' => 'facebook',
                'value' => 'https://www.facebook.com/groups/376476632366941/user/100000859473510/',
                'order' => 8,
            ],
            [
                'title' => 'twitter',
                'value' => '',
                'order' => 9,
            ],
            [
                'title' => 'youtube',
                'value' => 'https://www.youtube.com/channel/UCFtjQGc_FjABQXYvqtF3-Nw',
                'order' => 10,
            ],
            [
                'title' => 'instagram',
                'value' => '',
                'order' => 11,
            ], 
        ];

        foreach ($config_data as $item) {
            \App\Models\ContactData::create($item);
        }
    }
}
