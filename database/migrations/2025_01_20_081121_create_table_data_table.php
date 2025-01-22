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
        Schema::create('table_data', function (Blueprint $table) {
            $table->id();
            $table->string("table_title", 20); // 테이블 이름(제목)
            $table->integer("game_id")->nullable()->foreignId("games"); // 게임 아이디 
            $table->integer("max_player"); // 최대 플레이어 수
            // 위치 정보들
            $table->double("position_x");
            $table->double("position_y");
            // 크기 정보들
            $table->double("size_width");
            $table->double("size_height");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_data');
    }
};
