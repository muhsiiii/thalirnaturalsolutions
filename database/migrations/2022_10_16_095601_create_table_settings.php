<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->float('delivery_charge')->default(0);
            $table->string('promobanner',100)->default('');
            $table->string('promobannerurl',100)->default('');
            $table->string('website',75)->default('');
		    $table->string('email',75)->default('');
		    $table->string('fburl',75)->default('');
		    $table->string('instaurl',75)->default('');
		    $table->string('whatsappurl',75)->default('');
		    $table->string('youtubeurl',75)->default('');
		    $table->string('appandroidurl',75)->default('');
		    $table->string('appiosurl',75)->default('');
		    $table->longText('terms')->nullable();
		    $table->longText('aboutus')->nullable();
		    $table->longText('returnpolicy')->nullable();
		    $table->longText('privacypolicy')->nullable();
            $table->longText('shippingpolicy')->nullable();
            $table->longText('refundpolicy')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'delivery_charge' => '0'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
