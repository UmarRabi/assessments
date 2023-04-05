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
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('day1');
            $table->string('day2');
            $table->string('day3');
            $table->string('day4');
            $table->string('day5');
            $table->timestamps();
            $table->foreign('uid')->references('uid')->on('assessments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly');
    }
};
