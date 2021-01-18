<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->string('Address');
            $table->string('PhoneNumber');
            $table->string('Thumbnails');
            $table->text('Content');
            $table->integer('NewStatus')->default(0); // 0 : Chưa có bài viết ; 1 : Đã có bài viết
            $table->integer('Status'); // 0 : Chưa xử lý ; 1 : Đang xử lý ; 2 : Đã xử lý ;  3 : Không xử lý
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
        Schema::dropIfExists('reports');
    }
}
