<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addressdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('city');
            $table->string('pin');
            $table->string('state');
            $table->string('country');
            $table->string('phone_no');
            $table->string('addressproof'); 
            $table->integer('customer_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addressdetails');
    }
}
