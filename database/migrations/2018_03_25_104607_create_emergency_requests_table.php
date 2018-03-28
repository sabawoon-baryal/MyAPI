<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmergencyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_requests', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            // $table->integer('user_id')->unsigned();
            // $table->integer('blood_id')->unsigned();
            // $table->integer('province_id')->unsigned();
            // $table->integer('district_id')->unsigned();
            $table->string('location',250);
            $table->dateTime('date_time');
            $table->timestamps();

           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           //  $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade')->onUpdate('cascade');
           //  $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
           //  $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_requests');
    }
}
