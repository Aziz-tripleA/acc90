<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('item_name');
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('authors');
            $table->integer('item_size');
            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('book_types');
            $table->integer('cat_id')->unsigned()->nullable();
            $table->foreign('cat_id')->references('id')->on('book_categories');
            $table->integer('item_copies');
            $table->string('l_img')->nullable();
            $table->string('s_img')->nullable();
            $table->longText('book_details')->nullable();
            $table->longText('book_index')->nullable();
            $table->integer('pub_date')->nullable();
            $table->integer('translator_id')->unsigned()->nullable();
            $table->foreign('translator_id')->references('id')->on('translators');
            $table->integer('publish_id')->unsigned()->nullable();
            $table->foreign('publish_id')->references('id')->on('publishers');
            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('books');
    }
}
