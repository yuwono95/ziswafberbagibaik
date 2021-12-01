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
        });
    }
}
