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
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('reservation_id');
            $table->integer('user_id');
            $table->integer('hairstylist_id');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->string('reservation_request1');
            $table->string('reservation_request2');
            $table->string('reservation_request3');
            $table->string('reservation_request4');
            $table->string('reservation_request5');
            $table->text('reservation_comment');
            $table->integer('reservation_fee')->default(5000);
            $table->string('cancel_message')->nullable();
            $table->integer('reservation_flg')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
