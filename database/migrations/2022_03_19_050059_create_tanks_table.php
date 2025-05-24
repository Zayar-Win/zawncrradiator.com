<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanks', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('narye_code');
            $table->string('code');
            $table->string('pipe_size');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('up_down');
            $table->string('tank');

            $table->integer('price');
            $table->string('narye_code_price');
            $table->string('code_price');
            $table->integer('quantity');
            $table->integer('fixed_quantity');
            $table->integer('cnc_quantity')->nullable();
            $table->integer('nagoya_quantity')->nullable();
            $table->String('narye_mm')->nullable();
            $table->String('code_mm')->nullable();
            $table->String('remark')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanks');
    }
}
