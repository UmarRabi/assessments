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
            $table->boolean('day1');
            $table->boolean('day2');
            $table->boolean('day3');
            $table->boolean('day4');
            $table->boolean('day5');
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
