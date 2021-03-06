<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQaTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('qa_topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('receiver_id');
            $table->timestamps();
        });
    }
}
