<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentsTable extends Migration
{
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employments');
    }
}
