<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_configs', function (Blueprint $table) {
            $table->id();
            $table->string('first_section_title')->nullable();
            $table->string('first_section_subtitle')->nullable();
            $table->string('first_section_button_text')->nullable();
            $table->string('first_section_button_link')->nullable();

            $table->string('second_section_title')->nullable();
            $table->string('second_section_subtitle')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_configs');
    }
}
