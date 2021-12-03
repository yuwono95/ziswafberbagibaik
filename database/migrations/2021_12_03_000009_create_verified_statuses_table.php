<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('verified_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->unique();
            $table->timestamps();
        });
    }
}
