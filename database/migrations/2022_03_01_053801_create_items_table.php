<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->String('dx');
            $table->String('joka');
            $table->String('tk');
            $table->String('t_pic');

            $table->String('name');
            $table->String('photo')->nullable();
            $table->String('pa');
            $table->String('size');
            $table->String('high');
            $table->String('three_piece');
            $table->String('two_piece');
            $table->String('regular');
            $table->Integer('quantity');
            $table->Integer('fixed_quantity');
            $table->integer('cnc_quantity')->nullable();
            $table->integer('nagoya_quantity')->nullable();
            $table->String('joka_price');
            $table->String('tk_price');
            $table->String('dx_price');
            $table->String('t_pic_price');
            $table->String('joka_mm')->nullable();
            $table->String('tk_mm')->nullable();
            $table->String('dx_mm')->nullable();
            $table->String('t_pic_mm')->nullable();
            $table->String('cbm')->nullable();
            $table->String('ncr_id');
            $table->String('roll_grade')->nullable();
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
        Schema::dropIfExists('items');
    }
}
