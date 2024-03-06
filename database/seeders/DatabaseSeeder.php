<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            //generic
            StatusesTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            TranslatorSeeder::class,
            AuthorSeeder::class,
            PublisherSeeder::class,
            BookCategorySeeder::class,
            WriterSeeder::class,
            BookTypeSeeder::class,
            BookSeeder::class,
            EmployeeSeeder::class,
            NumberSeeder::class,
            AbuseNumberSeeder::class,
            ContactDataSeeder::class,
        ]);
    }
}
