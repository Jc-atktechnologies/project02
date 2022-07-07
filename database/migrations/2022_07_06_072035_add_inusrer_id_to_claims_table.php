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
            DB::statement("ALTER TABLE `claims` Add `insurer_id` BIGINT(20) UNSIGNED;");
            DB::statement("ALTER TABLE `claims` ADD CONSTRAINT `insurers_insurer_id_foreign` FOREIGN KEY (`insurer_id`) REFERENCES `insurers` (`id`)");
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
            $table->dropForeign('insurer_id');
            $table->dropIndex('insurer_id');
            $table->dropColumn('insurer_id');
        });
    }
};
