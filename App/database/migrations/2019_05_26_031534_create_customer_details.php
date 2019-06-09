<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
           $table->string('nic',13)->unique()->nullable(false)->primary();
           $table->string('name',30);
           $table->string('address',35);
           $table->integer('contact1',11)->autoIncrement(false)->nullable(false);
           $table->integer('contact2',11)->autoIncrement(false)->nullable(true);
           $table->float('amount');
           $table->string('selection');
           $table->float('installment');
           $table->date('date_purchased');
           
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
