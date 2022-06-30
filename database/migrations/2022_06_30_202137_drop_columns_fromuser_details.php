<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('user_details', function (Blueprint $table) {
            //
            DB::statement("ALTER TABLE `user_details` CHANGE `province_id` `province_id` BIGINT(20) UNSIGNED NULL;");
            DB::statement("ALTER TABLE `user_details` CHANGE `city_id` `city_id` BIGINT(20) UNSIGNED NULL;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
