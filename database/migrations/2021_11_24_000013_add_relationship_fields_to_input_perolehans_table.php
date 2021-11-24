<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInputPerolehansTable extends Migration
{
    public function up()
    {
        Schema::table('input_perolehans', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
        });
    }
}
