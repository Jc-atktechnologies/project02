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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('claim_number')->unique();
            $table->timestamp('claim_created_at')->nullable();
            $table->dateTime('date_time_loss')->nullable();
            $table->dateTime('date_time_reported')->nullable();
            $table->string('gross_loss_value');
            $table->string('actual_cash_value');
            $table->string('replacement_cost');
            $table->string('loss_type');
            $table->string('loss_cause');
            $table->string('line_of_business');
            $table->string('treaty_year');
            $table->string('treaty_type');
            $table->string('stat_limitations');
            $table->string('cat_code');
            $table->longText('loss_location');
            $table->string('loss_city');
            $table->string('loss_province');
            $table->string('loss_postal');
            $table->string('loss_description');
            $table->string('notes');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims');
    }
};
