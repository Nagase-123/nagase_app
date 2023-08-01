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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_name');
            $table->string('user_kana');
            $table->string('user_tel');
            $table->string('user_mail');
            $table->string('user_address');
            $table->text('user_memo')->nullable();
            $table->integer('user_flg')->default(0);
            $table->string('password');
            $table->timestamps();
        });
    }
/*          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->rememberToken();

*/

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
