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
        Schema::table('claims', function (Blueprint $table) {
            DB::statement("ALTER TABLE `claims` Add `representative_id` BIGINT(20) UNSIGNED;");
            DB::statement("ALTER TABLE `claims` ADD CONSTRAINT `insurers_representative_id_foreign` FOREIGN KEY (`representative_id`) REFERENCES `representatives` (`id`)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claims', function (Blueprint $table) {
           $table->dropForeign('representative_id');
           $table->dropIndex('representative_id');
           $table->dropColumn('representative_id'); 
        });
    }
};
