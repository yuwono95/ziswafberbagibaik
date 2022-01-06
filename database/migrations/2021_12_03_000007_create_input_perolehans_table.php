<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputPerolehansTable extends Migration
{
    public function up()
    {
        Schema::create('input_perolehans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namadonatur')->nullable();
            $table->string('nomorhp')->nullable();
            $table->decimal('zakatprofesi', 15, 2)->nullable();
            $table->decimal('zakatmaal', 15, 2)->nullable();
			$table->decimal('zakatfitrah', 15, 2)->nullable();
            $table->decimal('infaq', 15, 2)->nullable();
            $table->decimal('sedekah', 15, 2)->nullable();
            $table->decimal('wakafpendidikan', 15, 2)->nullable();
            $table->decimal('wakafproduktif', 15, 2)->nullable();
            $table->decimal('infaqkesehatan', 15, 2)->nullable();
            $table->timestamps();
        });
    }
}
