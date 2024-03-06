<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturedImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new \App\Models\FeaturedImage())->getTable())->truncate();
        $config_data = [
            [
                'title' => 'services',
            ],
            [
                'title' => 'announcement',
            ],
            [
                'title' => 'testimonials',
            ],
            [
                'title' => 'books',
            ],
            [
                'title' => 'articles',
            ],
            [
                'title' => 'courses',
            ],
            [
                'title' => 'contact us',
            ], 
            
        ];

        foreach ($config_data as $item) {
            \App\Models\FeaturedImage::create($item);
        }
    }
}
