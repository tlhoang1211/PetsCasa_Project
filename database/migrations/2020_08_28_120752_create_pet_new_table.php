<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_new', function (Blueprint $table) {
            $table->unsignedBigInteger('New_id');
            $table->foreign('New_id')->references('id')->on('news')->onDelete('cascade');
            $table->unsignedBigInteger('Pet_id');
            $table->foreign('Pet_id')->references('id')->on('pets')->onDelete('cascade');
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
        Schema::dropIfExists('pet_new');
    }
}
