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
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string('temperature');
            $table->string('humidity');
            $table->string('lux');
            $table->string('rain_time');
            $table->string('rain_accu');
            $table->string('rain_hour');
            $table->string('rain_raw');
            $table->string('soil_moisture');
            $table->string('wind_speed');
            $table->string('wind_direction');
            $table->string('pm2_5');
            $table->string('pm10');
            $table->string('pm1_0');
            $table->string('soil_nitrogen');
            $table->string('soil_phosporus');
            $table->string('soil_kalium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
