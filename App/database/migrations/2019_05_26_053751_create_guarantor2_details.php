<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuarantor2Details extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantor2_details', function (Blueprint $table) {
          $table->timestamp('g2_id')->primary();
          $table->string('cust2_id');
          $table->string('guarantor2_nic',15)->nullable(false);
          $table->string('guarantor2_name',30);
          $table->integer('guarantor2_contact1')->autoIncrement(false);
          $table->integer('guarantor2_contact2')->nullable(true)->autoIncrement(false);
          $table->foreign('cust2_id')->references('nic')->on('customer_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guarantor2_details');
    }
}
