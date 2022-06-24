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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('title',20)->nullable();
            $table->string('phone_number',20)->nullable();
            $table->string('mobile_number',20)->nullable();
            $table->string('smtp_email',80)->nullable();
            $table->string('smtp_password',50)->nullable();
            $table->foreignId('branch_id')->references('id')->on('branches')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('is_branch_manage')->default(0);
            $table->longText('address')->nullable();
            $table->foreignId('province_id')->references('id')->on('provinces')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('city_id')->references('id')->on('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('postal_code',50)->nullable();
            $table->date('dob')->nullable();
            $table->string('ssn');
            $table->string('emergency_contact',75)->nullable();
            $table->string('staff_class',100)->nullable();
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
        Schema::dropIfExists('user_details');
    }
};
