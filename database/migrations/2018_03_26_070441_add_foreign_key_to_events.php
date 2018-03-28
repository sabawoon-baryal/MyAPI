<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->integer('district_id')->unsigned();

             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evnets', function (Blueprint $table) {
            //
        });
    }
}
