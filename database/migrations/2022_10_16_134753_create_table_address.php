<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('customerid')->default(0);
            $table->string('name',64);
            $table->string('email',128);
            $table->string('mobile',20);
            $table->string('phone',20);
            $table->string('address',1024);
            $table->string('landmark',500);
            $table->string('pincode',10);
            $table->string('city',50);
            $table->string('district',50);
            $table->string('state',50);
            $table->string('type',20);
            $table->enum('default_address',['0','1'])->default('0');
    
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
