<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payment', function (Blueprint $table) {
            $table->string('pay_id')->unique()->primary();
            $table->string('cust_id');
            $table->date('date_pay');
            $table->float('amount');
            $table->boolean('isPaid');
            $table->string('payment-type');
            $table->integer('row_id')->autoIncrement(false);
            $table->integer('col_id')->autoIncrement(false);
            $table->foreign('cust_id')->references('nic')->on('customer_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_payment');
    }
}
