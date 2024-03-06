<?php

namespace Database\Seeders;

use App\Models\BookType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BookTypeSeeder extends Seeder
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

        $types = array('اصداراتنا','مكتبة الاستعارة','تلخيص كتاب');
        foreach($types as $type){
            BookType::create(['type_name'=>$type]);
        }
    }
}
