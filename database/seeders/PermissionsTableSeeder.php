<?php
namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Seed the User's table data.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table((new \App\Models\Role())->getTable())->truncate();
        $data = [
            [
                'name' =>'view_dashboard',
                'guard_name'=>'web'
            ]
            ,
            [
                'name' =>'view_pages',
                'guard_name'=>'web'
            ]

        ];
        Permission::insert($data);
    }
}
