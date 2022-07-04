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
        Schema::table('insurers', function(Blueprint $table){

            //$table->dropColumn('branch');
            //$table->unsignedBigInteger('branch_id')->after('company_name')->nullable(true);
            
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_address` `insurer_address` TEXT NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_city` `insurer_city` VARCHAR(255) NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_province` `insurer_province` VARCHAR(255) NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_postal` `insurer_postal` VARCHAR(255) NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_country` `insurer_country` VARCHAR(255) NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_fax` `insurer_fax` VARCHAR(255) NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_email` `insurer_email` VARCHAR(255) NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_altphone` `insurer_altphone` VARCHAR(255) NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_altemail` `insurer_altemail` VARCHAR(255) NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `insurer_notes` `insurer_notes` TEXT NULL;");
            DB::statement("ALTER TABLE `insurers` CHANGE `branch` `branch_id` BIGINT(20) UNSIGNED  NULL;");
            DB::statement("ALTER TABLE `insurers` ADD CONSTRAINT `insurers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`)");
            //$table->foreign('branch_id')->references('id')->on('branches');

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
