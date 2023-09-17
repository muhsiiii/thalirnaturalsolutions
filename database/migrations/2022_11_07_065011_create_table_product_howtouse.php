<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductHowtouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_howtouse', function (Blueprint $table) {
            $table->id();
            $table->integer('productid')->default(0);
            $table->integer('step')->default('1');
            $table->string('desc', 1024)->default('');
            $table->string('image', 128)->default('');
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
        Schema::dropIfExists('table_product_howtouse');
    }
}
