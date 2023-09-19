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
        Schema::create('vaccination_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('upazilla_id');
            $table->unsignedBigInteger('vaccine_id');
            $table->unsignedBigInteger('available');
            $table->unsignedBigInteger('enabled')->default(1);
            $table->foreign('upazilla_id')->references('id')->on('upazillas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccination_centers');
    }
};
