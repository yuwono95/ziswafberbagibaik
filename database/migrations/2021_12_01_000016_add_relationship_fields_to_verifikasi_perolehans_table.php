<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVerifikasiPerolehansTable extends Migration
{
    public function up()
    {
        Schema::table('verifikasi_perolehans', function (Blueprint $table) {
            $table->unsignedBigInteger('verificator_id');
            $table->foreign('verificator_id', 'verificator_fk_5458536')->references('id')->on('input_perolehans');
        });
    }
}
