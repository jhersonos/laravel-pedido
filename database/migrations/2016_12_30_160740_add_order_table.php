<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id');
            $table->integer('client');
            $table->double('deliveryAmount');
            $table->double('orderAmount');
            $table->double('totalAmount');
            $table->string('address');
            $table->string('references');
            $table->string('headquarter');
            $table->integer('rider_id');
            $table->string('orderComment');
            $table->string('district');
            $table->date('updated_at');
            $table->date('created_at');
            // $table->foreign('products_id')->references('id')->on('products');
            $table->foreign('rider_id')->references('id')->on('rider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
