<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'soil_nitrogen'    => $request->input('soil_nitrogen'),
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

    public function getSensors()
    {
        $sensors = Sensor::latest()->first();
        return response([
            'success' => true,
            'message' => 'List Data Sensor',
            'data' => $sensors
        ], 200);
    }

    public function getAllSensors()
    {
        $sensors = Sensor::all();
        return response([
            'success' => true,
            'message' => 'List Data Sensor',
            'data' => $sensors
        ], 200);
    }

    public function getDataByDate(Request $request)
    {
        $from = $request->input('from');
        $until = $request->input('until');

        $data = Sensor::whereBetween('created_at', [$from, $until])
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d %H:%i") as minute')
            ->selectRaw('AVG(temperature) as average_temperature')
            ->selectRaw('AVG(humidity) as average_humidity')
            ->selectRaw('AVG(lux) as average_lux')
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d %H:%i")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d %H:%i")'))
            ->get();
        return response([
            'success' => true,
            'message' => 'List Data Sensor',
            'data' => $data
        ], 200);
    }
}
