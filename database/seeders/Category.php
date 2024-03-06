<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Regulatory','Anit Money Laudry','ICO Regulations','Exchange Reg.','Organizations'];
        foreach ($names as $name) {
            \App\Models\Category::create([
                'name' => $name,
                'created_at' => now()->subDays(rand(1, 10)),
            ]);
        }
    }
}
