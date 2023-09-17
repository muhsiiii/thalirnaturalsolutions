<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSettingsAddNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->string('phone', 13)->default('');
            $table->string('address', 1024)->default('');
            $table->string('pincode', 10)->default('');
            $table->string('latitude', 64)->default('');
            $table->string('longitude', 64)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('pincode');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
    }
}
