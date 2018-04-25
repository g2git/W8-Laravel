<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachtigingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machtigings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->string('iban');
          $table->bigInteger('creditcard');
          $table->string('membership_plan');
          $table->string('fullname');
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
        Schema::dropIfExists('machtigings');
    }
}
