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
            if (Schema::hasColumn('claims', 'claim_created_at')) {
                $table->dropColumn('claim_created_at');
            }
            if (Schema::hasColumn('claims', 'date_time_loss')) {
                $table->dropColumn('date_time_loss');
            }
            if (Schema::hasColumn('claims', 'date_time_reported')) {
                $table->dropColumn('date_time_reported');
            }
            if (Schema::hasColumn('claims', 'gross_loss_value')) {
                $table->dropColumn('gross_loss_value');
            }
            if (Schema::hasColumn('claims', 'actual_cash_value')) {
                $table->dropColumn('actual_cash_value');
            }
            if (Schema::hasColumn('claims', 'replacement_cost')) {
                $table->dropColumn('replacement_cost');
            }
            if (Schema::hasColumn('claims', 'loss_type')) {
                $table->dropColumn('loss_type');
            }
            if (Schema::hasColumn('claims', 'loss_cause')) {
                $table->dropColumn('loss_cause');
            }
            if (Schema::hasColumn('claims', 'line_of_business')) {
                $table->dropColumn('line_of_business');
            }
            if (Schema::hasColumn('claims', 'treaty_year')) {
                $table->dropColumn('treaty_year');
            }
            if (Schema::hasColumn('claims', 'stat_limitations')) {
                $table->dropColumn('stat_limitations');
            }
            if (Schema::hasColumn('claims', 'cat_code')) {
                $table->dropColumn('cat_code');
            }
            if (Schema::hasColumn('claims', 'loss_location')) {
                $table->dropColumn('loss_location');
            }
            if (Schema::hasColumn('claims', 'loss_city')) {
                $table->dropColumn('loss_city');
            }
            if (Schema::hasColumn('claims', 'loss_province')) {
                $table->dropColumn('loss_province');
            }
            if (Schema::hasColumn('claims', 'loss_postal')) {
                $table->dropColumn('loss_postal');
            }
            if (Schema::hasColumn('claims', 'loss_description')) {
                $table->dropColumn('loss_description');
            }
            if (Schema::hasColumn('claims', 'notes')) {
                $table->dropColumn('notes');
            }
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
            //
        });
    }
};
