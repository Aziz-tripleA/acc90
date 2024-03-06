<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Industry extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Cryptocurrency'];
        foreach ($names as $name) {
            \App\Models\Industry::create([
                'name' => $name,
                'description' => \Faker\Factory::create()->text(),
                'created_at' => now()->subDays(rand(1, 10)),
            ]);
        }
    }
}
