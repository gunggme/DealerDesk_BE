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
        Schema::create('approved_device_data', function (Blueprint $table) {
            $table->id();
            $table->string("device_unique_id")->unique(); // 디바이스 고유 아이디
            $table->integer("table_id")->nullable()->foreignId("table_data"); // 테이블 아이디
            $table->enum("device_status", ["online", "offline"])->default("offline"); // 디바이스 상태
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approved_device_data');
    }
};
