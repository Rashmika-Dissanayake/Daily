<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletedTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_transactions', function (Blueprint $table) {
            $table->increments('id')->autoIncrement(true);
            $table->string('nic',13)->nullable(false);
            $table->string('name',30);
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
        Schema::dropIfExists('completed_transactions');
    }
}
