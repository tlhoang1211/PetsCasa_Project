<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('Email');
            $table->string('Salt');
            $table->string('PasswordHash');
            $table->string('Slug');
            $table->string('FullName');
            $table->date('DateOfBirth');
            $table->string('IDNo');
            $table->string('Avatar')->nullable();
            $table->string('PhoneNumber');
            $table->string('Address');
            $table->string('Status');
            $table->unsignedBigInteger('Role_id');
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
        Schema::dropIfExists('accounts');
    }
}
