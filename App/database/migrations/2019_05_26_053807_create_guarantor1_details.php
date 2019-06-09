<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuarantor1Details extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantor1_details', function (Blueprint $table) {
          $table->timestamp('g1_id')->primary();
          $table->string('cust1_id');
          $table->string('guarantor1_nic',15)->nullable(false);
          $table->string('guarantor1_name',30);
          $table->integer('guarantor1_contact1')->autoIncrement(false);
          $table->integer('guarantor1_contact2')->nullable(true)->autoIncrement(false);  
          $table->foreign('cust1_id')->references('nic')->on('customer_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guarantor1_details');
    }
}
