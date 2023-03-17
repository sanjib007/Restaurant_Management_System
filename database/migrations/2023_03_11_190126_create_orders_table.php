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
            $table->increments('id');
            $table->string('order_number');
            $table->integer('total_item');
            $table->string('order_status');
            $table->string('payment_status');
            $table->string('order_payment_method');
            $table->decimal('total_amount');
            $table->string('order_position');
            $table->integer('user_id')->unsigned();
            $table->string('order_person_name');
            $table->string('order_person_mobile');
            $table->string('order_total_person');
            $table->string('order_table_no');
            $table->string('order_contact_name');
            $table->string('order_contact_mobile');
            $table->string('order_contact_address');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
