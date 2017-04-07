<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanAllotmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_allotments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('principal');
            $table->integer('processfee');
            $table->integer('padscost');
            $table->string('status');           
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
        Schema::dropIfExists('loan_allotments');
    }
}
