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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable()->default(1);
            $table->string('ip_address');
            $table->string('user_agent');
            $table->string('payload');
            $table->date('last_activity');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        // Schema::table('sessions', function ($table) {
        //     Schema::drop('sessions');
        //     $table->dropForeign('id_user');
        // });
    }
};
