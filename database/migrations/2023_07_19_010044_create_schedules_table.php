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
        Schema::create('schedules', function (Blueprint $table) {
          $table->increments('schedule_id');
          $table->integer('hairstylist_id');
          $table->date('schedule_date');
          $table->integer('schedule_6')->default(0);
          $table->integer('schedule_7')->default(0);
          $table->integer('schedule_8')->default(0);
          $table->integer('schedule_9')->default(0);
          $table->integer('schedule_10')->default(0);
          $table->integer('schedule_11')->default(0);
          $table->integer('schedule_12')->default(0);
          $table->integer('schedule_13')->default(0);
          $table->integer('schedule_14')->default(0);
          $table->integer('schedule_15')->default(0);
          $table->integer('schedule_16')->default(0);
          $table->integer('schedule_17')->default(0);
          $table->integer('schedule_18')->default(0);
          $table->integer('schedule_19')->default(0);
          $table->integer('schedule_20')->default(0);
          $table->integer('schedule_21')->default(0);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
