<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the User's table data.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table((new \App\Models\Role())->getTable())->truncate();
        $list = [
            [
                'name'         => 'admin',
            ],
            [
                'name'         => 'customer',
            ],
        ];

        foreach ($list as $k => $v) {
            $role = Role::create($v);
            if($k == 0){
                $role->syncPermissions(Permission::get());
            }
        }
    }
}
