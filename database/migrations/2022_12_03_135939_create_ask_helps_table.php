<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAskHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ask_helps', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->integer('age');
            $table->string('humanType');
            $table->string('email');
            $table->string('mobile');
            $table->string('city');
            $table->string('contactBefore');
            $table->string('time')->nullable();
            $table->string('day')->nullable();
            $table->string('am_pm')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('ask_helps');
    }
}
