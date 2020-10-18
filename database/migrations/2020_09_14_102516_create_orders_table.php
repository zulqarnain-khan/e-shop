<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            
            $table->boolean('same_delivery');
            $table->string('FlatShippingRate');
            $table->text('shipping_comments')->nullable();
            $table->string('CashOnDelivery');
            $table->text('payment_comments')->nullable();
            $table->text('order_no')->nullable();
            $table->text('cart');
            $table->integer('total_amount');
            $table->integer('order_sttaus')->default(0);;
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
        Schema::dropIfExists('orders');
    }
}
