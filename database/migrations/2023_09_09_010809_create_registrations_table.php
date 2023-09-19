<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('dob');
            $table->string('id_no');
            $table->string('phone_no');
            $table->unsignedBigInteger('center_id');
            $table->dateTime('upcoming_date')->nullable();
            $table->dateTime('v1_date')->nullable();
            $table->dateTime('v2_date')->nullable();
            $table->string('unique_id')->nullable();
            $table->unsignedBigInteger('diabetes');
            $table->foreign('center_id')->references('id')->on('vaccination_centers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
