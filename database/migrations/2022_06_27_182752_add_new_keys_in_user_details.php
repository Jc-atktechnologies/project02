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
            $table->after('staff_class', function ($tab){
                $tab->string('external_link')->nullable();
                $tab->date('license_expiry')->nullable();
                $tab->string('preferred_for',30)->nullable();
                $tab->smallInteger('rating')->nullable();
                $tab->string('languages')->nullable();
                $tab->string('comments')->nullable();
                $tab->string('ledes_billing_id')->nullable();
                $tab->string('claim_access')->nullable();
                $tab->string('analytics_view')->nullable();
                $tab->string('interface_theme')->nullable();
                $tab->string('calendar_viewable_by')->nullable();
                $tab->boolean('calendar_setting')->default(0);
                $tab->boolean('internal_email')->default(0);
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
            $table->dropColumn(['external_link','license_expiry','preferred_for','rating','languages','comments','ledes_billing_id','claim_access','analytics_view','interface_theme','calendar_viewable_by','calendar_setting','internal_email']);
        });
    }
};
