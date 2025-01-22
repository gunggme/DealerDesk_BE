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
        Schema::create('preset_data', function (Blueprint $table) {
            $table->id();
            $table->string("preset_name", 20); // 프리셋 이름
            $table->json("time_table_data"); // 시간 테이블
            $table->json("prize_array_data"); // 상금 배열
            $table->string("buy_in_price"); // 참가비 가격
            $table->string("starting_chip"); // 시작 칩 수
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preset_data');
    }
};
