<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUserAlertPivotTable extends Migration
{
    public function up()
    {
        Schema::create('user_user_alert', function (Blueprint $table) {
            $table->unsignedBigInteger('user_alert_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('read')->default(0);
        });
    }
}
