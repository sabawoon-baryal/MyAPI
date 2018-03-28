
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
           // $table->integer('blood_id')->unsigned();
            // $table->integer('province_id')->unsigned();
            // $table->integer('district_id')->unsigned();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',150)->unique();
            $table->string('password');
            $table->binary('image')->nullable();
            $table->date('birthday');
            $table->string('address',150);
            $table->enum('type',['Admin','User']);
            $table->rememberToken();
            $table->timestamps();


            // $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
