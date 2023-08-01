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
        Schema::create('hairstylists', function (Blueprint $table) {
          $table->increments('hairstylist_id');
          $table->string('hairstylist_name');
          $table->string('hairstylist_kana');
          $table->string('hairstylist_tel');
          $table->string('hairstylist_mail');
          $table->string('hairstylist_address');
          $table->text('hairstylist_profile');
          $table->string('hairstylist_advantage');
          $table->integer('hairstylist_flg')->default(1);
          $table->string('hairstylist_pass');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hairstylists');
    }
};
