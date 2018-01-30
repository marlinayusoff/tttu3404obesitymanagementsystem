<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_patients', function (Blueprint $table) {
            $table->increments('patientid');
            $table->string('username');
            $table->string('password');
            $table->string('name');
            $table->integer('icNo');
            $table->string('dateOfBirth');
            $table->string('gender');
            $table->string('religion');
            $table->string('currentInfo');
            $table->string('race');
            $table->string('address');
            $table->string('status');
            $table->string('telNo');
            $table->string('education');
            $table->string('email');
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
        Schema::dropIfExists('tbl_patients');
    }
}
