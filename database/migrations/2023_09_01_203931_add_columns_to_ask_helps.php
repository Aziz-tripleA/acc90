<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAskHelps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ask_helps', function (Blueprint $table) {
            $table->string('how_know')->nullable();
            $table->boolean('has_previous_help')->nullable();
            $table->bigInteger('counseling_type_id')->unsigned()->nullable();
        });

        Schema::table('ask_helps', function($table) {
            $table->foreign('counseling_type_id')->references('id')->on('counseling_types');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ask_helps', function (Blueprint $table) {
            $table->string('how_know')->nullable();
            $table->boolean('has_previous_help')->nullable();
            $table->string('type')->nullable();
        });
    }
}
