<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeTable extends Migration
{
    public function up()
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_birth');
            $table->char('sex', 1);
            $table->string('phone');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('education_id')->unsigned()->nullable();
            $table->foreign('education_id')->references('id')->on('educations');
            $table->integer('university_id')->unsigned()->nullable();
            $table->foreign('university_id')->references('id')->on('universities');
            $table->string('specialization');
            $table->integer('year_of_graduation');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resume');
    }
}
