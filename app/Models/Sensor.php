<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $table = 'sensors';

    protected $fillable = [
        'temperature',
        'humidity',
        'lux',
        'rain_time',
        'rain_accu',
        'rain_raw',
        'rain_hour',
        'soil_moisture',
        'wind_speed',
        'wind_direction',
        'pm2_5',
        'pm10',
        'pm1_0',
        'soil_nitrogen',
        'soil_phosporus',
        'soil_kalium'
    ];
}
