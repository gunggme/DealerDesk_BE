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
        //
        Schema::create('device_request_data', function (Blueprint $table) {
            $table->id();
            $table->string("device_unique_id")->unique(); // 디바이스 고유 아이디
            $table->enum("device_status", ["pending", "accepted", "rejected", "canceled"])->default("pending"); // 디바이스 상태
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_request_data');
    }
};
