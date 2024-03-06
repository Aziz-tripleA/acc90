<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_configs', function (Blueprint $table) {
            $table->id();
            $table->string('first_section_title')->nullable();
            $table->string('first_section_subtitle')->nullable();
            $table->text('first_section_text')->nullable();

            $table->string('second_section_title')->nullable();
            $table->text('second_section_text')->nullable();

            $table->string('third_section_video_url')->nullable();
            $table->string('third_section_title')->nullable();

            $table->string('fourth_section_title')->nullable();

            $table->string('fifth_section_title')->nullable();
            $table->text('fifth_section_text')->nullable();

            $table->string('sixth_section_title')->nullable();
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
        Schema::dropIfExists('about_configs');
    }
}
