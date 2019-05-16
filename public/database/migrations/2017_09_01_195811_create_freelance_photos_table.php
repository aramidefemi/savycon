<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelance_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freelance_id')->unsigned();
            $table->foreign('freelance_id')->references('id')->on('freelancers');
            $table->string('filename');
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
        Schema::drop('freelance_photos');
    }
}
