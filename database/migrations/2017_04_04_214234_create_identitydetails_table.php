<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentitydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitydetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gardian');
            $table->string('relation');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('pan_no');
            $table->string('aadhar_no');
            $table->string('idproof');
            $table->date('dob');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identitydetails');
    }
}
