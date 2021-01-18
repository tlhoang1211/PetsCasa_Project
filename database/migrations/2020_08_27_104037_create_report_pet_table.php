<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportPetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_pet', function (Blueprint $table) {
            $table->unsignedBigInteger('Report_id');
            $table->foreign('Report_id')->references('id')->on('reports')->onDelete('cascade');
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
        Schema::dropIfExists('report_pet');
    }
}
