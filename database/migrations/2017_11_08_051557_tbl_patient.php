<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_patient', function (Blueprint $table) {
            $table->increments('patientId');
            $table->string('username');
            $table->string('password');
            $table->string('name');
            $table->string('icNo');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('religion');
            $table->string('currentInfo');
            $table->string('race');
            $table->string('address');
            $table->string('status');
            $table->int('telNo');
            $table->string('education');
            $table->string('email');
            $table->string('hipertensi');
            $table->string('kardiovaskular');
            $table->string('diabetes');
            $table->string('asma');
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
        //
    }
}
