<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiPerolehansTable extends Migration
{
    public function up()
    {
        Schema::create('verifikasi_perolehans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
    }
}
