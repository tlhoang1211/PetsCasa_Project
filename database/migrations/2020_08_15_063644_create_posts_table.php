<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Slug');
            $table->string('Content');
            $table->unsignedBigInteger('Pet_id');
            $table->foreign('Pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->unsignedBigInteger('Account_id');
            $table->foreign('Account_id')->references('id')->on('pets')->onDelete('cascade');
            $table->integer('Status'); // 0 : Deactive , 1 : Active
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
        Schema::dropIfExists('posts');
    }
}
