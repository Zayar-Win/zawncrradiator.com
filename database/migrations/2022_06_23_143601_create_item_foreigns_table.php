<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemForeignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_foreigns', function (Blueprint $table) {
            $table->id();
            $table->String('dx')->nullable();;
            $table->String('joka')->nullable();;
            $table->String('tk')->nullable();;
            $table->String('name')->nullable();;
            $table->String('photo')->nullable();
            $table->String('pa')->nullable();;
            $table->String('size')->nullable();;
            $table->String('high')->nullable();;
            $table->String('three_piece')->nullable();;
            $table->String('two_piece')->nullable();;
            $table->String('regular')->nullable();;
            $table->Integer('quantity')->nullable();;
            $table->Integer('fixed_quantity')->nullable();;
            $table->String('joka_price')->nullable();;
            $table->String('tk_price')->nullable();;
            $table->String('dx_price')->nullable();;
            $table->String('joka_mm')->nullable();
            $table->String('tk_mm')->nullable();
            $table->String('dx_mm')->nullable();
            $table->String('cbm')->nullable();
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
        Schema::dropIfExists('item_foreigns');
    }
}
