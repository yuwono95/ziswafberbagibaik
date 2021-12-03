<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id', 'kecamatan_fk_5488801')->references('id')->on('kecamatans');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_5467500')->references('id')->on('teams');
        });
    }
}
