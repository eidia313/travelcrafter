<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            //
            $table->unsignedInteger('activity_id')->after('city_id')->nullable();
            $table->foreign('activity_id')->references('id')->on('activity')->onDelete('cascade');

            $table->unsignedInteger('region_id')->after('activity_id')->nullable();
            $table->foreign('region_id')->references('id')->on('region')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('places', function (Blueprint $table) {
            //
        });
    }
}