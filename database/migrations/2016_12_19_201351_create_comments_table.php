<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id')->unsigned()->default(0);
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');

            $table->integer('author_id')->unsigned()->default(0);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('post_id')->unsigned()->default(0);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->longText('content')->nullable();
            $table->datetime('posted_at');
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
        Schema::drop('comments');
    }
}
