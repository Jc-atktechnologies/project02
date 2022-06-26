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
        Schema::create('insureds', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->dateTime('insureds_address');
            $table->dateTime('insureds_city');
            $table->string('insureds_province');
            $table->string('insureds_postal');
            $table->string('insureds_country');
            $table->string('insureds_phone');
            $table->string('insureds_fax');
            $table->string('insureds_email');
            $table->string('insureds_altphone');
            $table->string('insureds_altemail');
            $table->string('insureds_notes');
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
        Schema::dropIfExists('insureds');
    }
};
