<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailPhoneClistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clist', function (Blueprint $table) {
             $table->text('email');
             $table->text('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clist', function (Blueprint $table) {
             $table->dropColumn('email');
             $table->dropColumn('phone');
        });
    }
}
