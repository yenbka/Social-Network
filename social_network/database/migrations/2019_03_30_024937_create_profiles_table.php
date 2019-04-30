<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('about_me')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->integer('gender');
            $table->integer('phone')->nullable();
            $table->integer('status')->nullable();
            $table->string('avatar_path')->nullable();
            $table->string('header_path')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
