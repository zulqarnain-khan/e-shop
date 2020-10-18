<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->string('billing_mobile');
            $table->string('billing_telephone')->nullable();
            $table->integer('billing_fax')->nullable();
            $table->string('billing_company')->nullable();
            $table->string('billing_address1');
            $table->string('billing_address2')->nullable();
            $table->string('billing_city');
            $table->integer('billing_post_code');
            $table->string('billing_country');
            $table->string('billing_region_state');

            $table->string('delivery_fname')->nullable();
            $table->string('delivery_lname')->nullable();
            $table->string('delivery_email')->nullable();
            $table->string('delivery_mobile')->nullable();
            $table->string('delivery_telephone')->nullable();
            $table->integer('delivery_fax')->nullable();
            $table->string('delivery_company')->nullable();
            $table->string('delivery_address1')->nullable();
            $table->string('delivery_address2')->nullable();
            $table->string('delivery_city')->nullable();
            $table->integer('delivery_post_code')->nullable();
            $table->string('delivery_country')->nullable();
            $table->string('delivery_region_state')->nullable();

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
        Schema::dropIfExists('customer_details');
    }
}
