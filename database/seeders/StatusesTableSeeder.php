<?php
namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table((new \App\Models\Status())->getTable())->truncate();

        $activeStatus = [
            [
                'title' => [
                    'en' => 'Active',
                    'ar' => 'نشط'
                ],
                'color' => 'success',
            ],
            [
                'title' => [
                    'en' => 'Inactive',
                    'ar' => 'غير نشط'
                ],
                'color' => 'danger',
            ],
        ];
        $list = [
            'User' =>
                [
                    'status' => $activeStatus,
                ],
            'Category' =>
                [
                    'status' => $activeStatus,
                ],
            'Article' =>
                [
                    'status' => $activeStatus,
                ],
            'Book' =>
                [
                    'status' => $activeStatus,
                ],
            'Course' =>
                [
                    'status' => $activeStatus,
                ],
            'Ads' =>
                [
                    'status' => $activeStatus,
                ],

            'Order' => [
                'status' => [
                    [
                        'title' => [
                            'en' => 'Ordered', //1
                            'ar' => 'تم الطلب',
                        ],
                        'color' => 'warning',
                        'wait_for' => 2,
                    ],


                    [
                        'title' => [
                            'en' => 'Pending Payment', //6
                            'ar' => '',
                        ],
                        'color' => 'danger',
                        'wait_for' => 1,
                    ],
                    [
                        'title' => [
                            'en' => 'Failed Payment', //7
                            'ar' => '',
                        ],
                        'color' => 'danger',
                        'wait_for' => 1,
                    ],
                ],

                'payment_method' => [
                    [
                        'title' => [
                            'en' => 'Cash On Delivery', //1
                            'ar' => 'نقداََ عند الاستلام',
                        ],
                        'order' => 1,
                        'is_active'=>1,
                        'color' => asset('assets/payment-methods/cod.png'),
                    ],
                    [
                        'title' => [
                            'en' => 'Credit card or Fawry', //3
                            'ar' => 'البطاقة الائتمانية',
                        ],
                        'order' => 2,
                        'color' => asset('assets/payment-methods/fawry.png'),
                    ],

                ],

            ],
            'Testimonial' =>
                [
                    'status' => $activeStatus,
                ],
            'Ads' =>
            [
                'status' => $activeStatus,
            ],
            'Perpos' =>
            [
                'status' => $activeStatus,
            ],
            'AbuseNumber' =>
            [
                'status' => $activeStatus,
            ],
            'Number' =>
            [
                'status' => $activeStatus,
            ],
            'Employee' =>
            [
                'status' => $activeStatus,
            ],
        ];

        $this->setList($list);

    }

    private function setList($list)
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($list as $model_name => $group_name) {
            foreach ($group_name as $key => $status) {
                for ($i = 0; $i < count($status); $i++) {
                    Status::create([
                        'model_name' => $model_name,
                        'group_name' => $key,
                        'order' => isset($status[$i]['order']) ? $status[$i]['order'] : $i + 1,
                        'title' => is_array($status[$i]['title']) ? $status[$i]['title'] : array_fill_keys($langs, $status[$i]['title']),
                        'description' => array_fill_keys($langs, $status[$i]['title']),
                        'color' => isset($status[$i]['color']) ? $status[$i]['color'] : null,
                        'wait_for'=>isset($status[$i]['wait_for']) ? $status[$i]['wait_for'] : 12,
                        'is_active' => isset($status[$i]['is_active']) ? $status[$i]['is_active'] : true
                    ]);
                }
            }
        }
    }
}
