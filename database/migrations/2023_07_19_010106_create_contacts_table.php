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
        Schema::create('contacts', function (Blueprint $table) {
          $table->increments('contact_id');
          $table->string('user_name');
          $table->string('user_kana');
          $table->string('user_tel');
          $table->string('user_mail');
          $table->text('contact_text');
          $table->text('contact_reply')->nullable();
          $table->integer('contact_flg')->default(0);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
