<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserAlertsTable extends Migration
{
    public function up()
    {
        Schema::table('user_alerts', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
        });
    }
}
