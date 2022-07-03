<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            //
            $table->after('address',function ($tab){
                $tab->string('city',80)->nullable();
                $tab->string('state',70)->nullable();
                $tab->string('country',60)->nullable();
                $tab->string('zip_code',20)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            //
            $table->dropColumn(['city','state','country','zip_code']);
        });
    }
};
