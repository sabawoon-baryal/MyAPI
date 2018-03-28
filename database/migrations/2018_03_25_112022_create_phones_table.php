<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            // $table->integer('user_id')->unsigned();
            $table->integer('phone')->unique()->unsigned();
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('casca');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
