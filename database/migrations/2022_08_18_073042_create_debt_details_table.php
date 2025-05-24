<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt_details', function (Blueprint $table) {
            $table->id();
            $table->integer('debt_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->date('debt_date')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->integer('remaining_amount')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('debt_details');
    }
}
