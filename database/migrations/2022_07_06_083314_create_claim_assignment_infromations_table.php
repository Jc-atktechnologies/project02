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
        Schema::create('claim_assignment_infromations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calim_ctegory_id');
            $table->foreign('calim_ctegory_id')->references('id')->on('claim_categories');
            $table->string('assign_to')->nullable(true);
            $table->unsignedBigInteger('share_with')->nullable(true);
            $table->foreign('share_with')->references('id')->on('users');
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
        Schema::dropIfExists('claim_assignment_infromations');
    }
};
