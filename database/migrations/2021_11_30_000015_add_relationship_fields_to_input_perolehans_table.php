<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInputPerolehansTable extends Migration
{
    public function up()
    {
        Schema::table('input_perolehans', function (Blueprint $table) {
            $table->unsignedBigInteger('namabank_id');
            $table->foreign('namabank_id', 'namabank_fk_5412297')->references('id')->on('banks');
            $table->unsignedBigInteger('verifiedstatus_id')->nullable();
            $table->foreign('verifiedstatus_id', 'verifiedstatus_fk_5458045')->references('id')->on('verified_statuses');
        });
    }
}
