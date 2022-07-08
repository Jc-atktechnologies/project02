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
        Schema::table('claim_assignment_infromations', function (Blueprint $table) {
            $table->unsignedBigInteger('claim_id');
            $table->foreign('claim_id')->references('id')->on('claims');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claim_assignment_infromations', function (Blueprint $table) {
            $table->dropForeign('claim_id');
            $table->dropIndex('claim_id');
            $table->dropColumn('claim_id');
        });
    }
};
