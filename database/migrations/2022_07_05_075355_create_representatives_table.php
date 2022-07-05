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
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurer_id');
            $table->foreign('insurer_id')->references('id')->on('insurers');
            $table->string('name')->nullable(true);
            $table->string('title')->nullable(true);
            $table->string('phone')->unique();
            $table->string('cell')->nullable(true);
            $table->string('email')->unique();
            $table->boolean('is_active')->default(true)->comment('true for active and false for inactive');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('representatives');
    }
};
