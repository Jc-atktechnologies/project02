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
        Schema::create('claim_loss_details', function (Blueprint $table) {
            $table->id();
            $table->date('loss_date')->nullable(true);
            $table->string('loss_time')->nullable(true);
            $table->unsignedBigInteger('loss_type_id');
            $table->foreign('loss_type_id')->references('id')->on('loss_types');
            $table->date('reported_date')->nullable(true);
            $table->text('loss_location')->nullable(true);
            $table->text('loss_description')->nullable(true);
            $table->string('country')->nullable(true);
            $table->text('additional_notes')->nullable(true);
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
        Schema::dropIfExists('claim_loss_details');
    }
};
