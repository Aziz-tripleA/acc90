<?php
namespace Database\Seeders;
use App\Models\User;
use App\Acme\Core;
use Illuminate\Database\Seeder;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin
        $user = User::create([
            'first_name' => "Road9",
            'last_name' => "Admin",
            'email' => "admin@road9media.com",
            'password' => 'secret',
            'mobile' => '0123456789',
            'email_verified_at' => now(),
        ]);
//        $user->addHashedMedia(public_path('assets/admin/img/avatars/avatar_' . rand(1, 6) . '.png'))
//            ->preservingOriginal()
//            ->toMediaCollection('avatar');
        $user->syncRoles(['admin']);




    }
}
