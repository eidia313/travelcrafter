<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClistDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('c_id')->unsigned();
            $table->foreign('c_id')->references('id')->on('ccountry');
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
        Schema::drop('clist');
    }
}
