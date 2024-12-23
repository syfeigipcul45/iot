<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function index()
    {
        $sensors = Sensor::all();
        return response([
            'success' => true,
            'message' => 'List Semua Sensor',
            'data' => $sensors
        ], 200);
    }

    public function sensor(Request $request)
    {
        $sensors = Sensor::create([
            'temperature'       => $request->input('temperature'),
            'humidity'          => $request->input('humidity'),
            'lux'               => $request->input('lux'),
            'rain_time'         => $request->input('rain_time'),
            'rain_accu'         => $request->input('rain_accu'),
            'rain_raw'          => $request->input('rain_raw'),
            'rain_hour'         => $request->input('rain_hour'),
            'soil_moisture'     => $request->input('soil_moisture'),
            'wind_speed'        => $request->input('wind_speed'),
            'wind_direction'    => $request->input('wind_direction'),
            'pm2_5'             => $request->input('pm2_5'),
            'pm10'              => $request->input('pm10'),
            'pm1_0'             => $request->input('pm1_0'),
            'soil_nitorogen'    => $request->input('soil_nitorogen'),
            'soil_phosporus'    => $request->input('soil_phosporus'),
            'soil_kalium'       => $request->input('soil_kalium'),
        ]);

        if ($sensors) {
            return response()->json([
                'success' => true,
                'message' => 'Sensor Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sensor Gagal Disimpan!',
            ], 401);
        }
    }
}
