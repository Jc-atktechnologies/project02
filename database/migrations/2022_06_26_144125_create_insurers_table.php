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
        Schema::create('insurers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique();
            $table->timestamp('branch')->nullable();
            $table->dateTime('insurer_address')->nullable();
            $table->dateTime('insurer_city')->nullable();
            $table->string('insurer_province');
            $table->string('insurer_postal');
            $table->string('insurer_country');
            $table->string('insurer_phone');
            $table->string('insurer_fax');
            $table->string('insurer_email');
            $table->string('insurer_altphone');
            $table->string('insurer_altemail');
            $table->string('insurer_notes');
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
    Schema::dropIfExists('insurers');
    }
};