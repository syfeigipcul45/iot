<template>
    <div>
        <div class="container-fluid py-4">
            <!-- <div class="row">
                <div class="col-lg-6">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">
                            <h6>Temperature</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="temperatureChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">
                            <h6>Humidity</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="humidityChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card bg-light z-index-2">
                        <div class="card-header bg-light pb-0">
                            <h6>Kondisi Udara</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">
                                    <div class="card">
                                        <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                        <div class="card-body p-3 position-relative">
                                            <div class="row" v-if="sensorData">
                                                <span>{{ dateCuaca }}</span>
                                                <div class="col-4 text-start">
                                                    <!-- <div class="icon icon-shape text-center border-radius-2xl"> -->
                                                    <img :src="cuacaImg" height="100%" width="100%">
                                                    <!-- </div> -->
                                                    <!-- <div>
                                                <span class="text-black text-3xl">{{ sensorData.temperature }} °C</span>
                                            </div> -->
                                                </div>
                                                <div class="col-8 text-justify" v-if="sensorData">
                                                    <span class="text-black text-sm">Temperature: </span><span
                                                        class="text-black text-sm">{{ sensorData.temperature
                                                        }}°C</span><br>
                                                    <span class="text-black text-sm">Humidity: </span><span
                                                        class="text-black text-sm">{{ sensorData.humidity }}%</span><br>
                                                    <span class="text-black text-sm">Wind Speed: </span><span
                                                        class="text-black text-sm">{{ sensorData.wind_speed
                                                        }}m/s</span><br>
                                                    <span class="text-black text-sm">Curah Hujan: </span><span
                                                        class="text-black text-sm">{{ sensorData.rain_hour }}mm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <div class="card">
                                        <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                        <div class="card-body p-3 position-relative">
                                            <div class="row">
                                                <div class="col-8 text-start">
                                                    <div class="icon icon-shape text-center border-radius-2xl">
                                                        <img :src="'_homepage/icon/pm1_0.png'" height="150%"
                                                            width="150%">
                                                    </div>
                                                </div>
                                                <div class="col-4 text-center" v-if="sensorData">
                                                    <img :src="pm1_0Img" height="70%" width="70%"><br>
                                                    <!-- <div v-if="sensorData.pm1_0 >= 0 && sensorData.pm1_0 <= 10">
                                                <img :src="'_homepage/icon/baik.png'" height="96px" width="96px">
                                            </div>
                                            <div v-else-if="sensorData.pm1_0 >= 11 && sensorData.pm1_0 <= 20">
                                                <img :src="'_homepage/icon/sedang.png'" height="96px" width="96px">
                                            </div>
                                            <div v-else-if="sensorData.pm1_0 >= 21 && sensorData.pm1_0 <= 35">
                                                <img :src="'_homepage/icon/tidak_sehat.png'" height="96px" width="96px">
                                            </div>
                                            <div v-else>
                                                <img :src="'_homepage/icon/sangat_tidak_sehat.png'" height="96px"
                                                    width="96px">
                                            </div> -->
                                                    <span class="text-black text-sm">{{ sensorData.pm1_0 }} µm/m³</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <span class="text-black" style="font-size: small;">Particulate Matter
                                                    (PM1.0)
                                                    adalah Partikel
                                                    udara yang berukuran lebih kecil dari
                                                    1 µm (mikrometer).</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-md-0">
                                    <div class="card">
                                        <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                        <div class="card-body p-3 position-relative">
                                            <div class="row">
                                                <div class="col-8 text-start">
                                                    <div class="icon icon-shape text-center border-radius-2xl">
                                                        <img :src="'_homepage/icon/pm2_5.png'" height="150%"
                                                            width="150%">
                                                    </div>
                                                </div>
                                                <div class="col-4 text-center" v-if="sensorData">
                                                    <img :src="pm2_5Img" height="70%" width="70%"><br>
                                                    <span class="text-black text-sm">{{ sensorData.pm2_5 }} µm/m³</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <span class="text-black" style="font-size: small;">Particulate Matter
                                                    (PM2.5)
                                                    adalah partikel
                                                    udara yang berukuran lebih kecil
                                                    dari 2.5 µm (mikrometer).</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-md-0">
                                    <div class="card">
                                        <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                        <div class="card-body p-3 position-relative">
                                            <div class="row">
                                                <div class="col-8 text-start">
                                                    <div class="icon icon-shape text-center border-radius-2xl">
                                                        <img :src="'_homepage/icon/pm10.png'" height="150%"
                                                            width="150%">
                                                    </div>
                                                </div>
                                                <div class="col-4 text-center" v-if="sensorData">
                                                    <img :src="pm10Img" height="70%" width="70%"><br>
                                                    <!-- <div v-if="sensorData.pm10 >= 0 && sensorData.pm10 <= 50">
                                                <img :src="'_homepage/icon/baik.png'" height="96px" width="96px">
                                            </div>
                                            <div v-else-if="sensorData.pm10 >= 50 && sensorData.pm10 <= 150">
                                                <img :src="'_homepage/icon/sedang.png'" height="96px" width="96px">
                                            </div>
                                            <div v-else-if="sensorData.pm10 >= 151 && sensorData.pm10 <= 350">
                                                <img :src="'_homepage/icon/tidak_sehat.png'" height="96px" width="96px">
                                            </div>
                                            <div v-else-if="sensorData.pm10 >= 351 && sensorData.pm10 <= 420">
                                                <img :src="'_homepage/icon/sangat_tidak_sehat.png'" height="96px"
                                                    width="96px">
                                            </div>
                                            <div v-else>
                                                <img :src="'_homepage/icon/berbahaya.png'" height="96px" width="96px">
                                            </div> -->
                                                    <span class="text-black text-sm">{{ sensorData.pm10 }} µm/m³</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <span class="text-black" style="font-size: small;">Particulate Matter
                                                    (PM10)
                                                    adalah Partikel udara
                                                    yang berukuran lebih kecil
                                                    dari 10 µm (mikrometer).</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 col-12">
                    <div class="card bg-light z-index-2">
                        <div class="card-header bg-light pb-0">
                            <h6>Kondisi Tanah</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">
                                    <div class="card">
                                        <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                        <div class="card-body p-3 position-relative">
                                            <div class="row">
                                                <div class="col-5 text-start">
                                                    <div class="icon icon-shape text-center border-radius-2xl">
                                                        <img :src="'_homepage/icon/soil.png'" height="100%"
                                                            width="100%">
                                                    </div>
                                                </div>
                                                <div class="col-7 text-justify" v-if="sensorData">
                                                    <!-- <img :src="pm1_0Img" height="70%" width="70%"><br> -->
                                                    <span class="text-black text-sm">{{ sensorData.soil_moisture }}%</span><br>
                                                    <span class="text-black" style="font-size: small; font-weight: bold;">Kelembaban Tanah</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <div class="card">
                                        <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                        <div class="card-body p-3 position-relative">
                                            <div class="row">
                                                <div class="col-5 text-start">
                                                    <div class="icon icon-shape text-center border-radius-2xl">
                                                        <img :src="'_homepage/icon/nitrogen.png'" height="100%"
                                                            width="100%">
                                                    </div>
                                                </div>
                                                <div class="col-7 text-justify" v-if="sensorData">
                                                    <span class="text-black text-sm">{{ sensorData.soil_nitrogen }}</span><br>
                                                    <span class="text-black" style="font-size: small; font-weight: bold;">mg/kg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-md-0">
                                    <div class="card">
                                        <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                        <div class="card-body p-3 position-relative">
                                            <div class="row">
                                                <div class="col-5 text-start">
                                                    <div class="icon icon-shape text-center border-radius-2xl">
                                                        <img :src="'_homepage/icon/phosphorus.png'" height="100%"
                                                            width="100%">
                                                    </div>
                                                </div>
                                                <div class="col-7 text-justify" v-if="sensorData">
                                                    <span class="text-black text-sm">{{ sensorData.soil_phosporus }}</span><br>
                                                    <span class="text-black" style="font-size: small; font-weight: bold;">mg/kg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-md-0">
                                    <div class="card">
                                        <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                        <div class="card-body p-3 position-relative">
                                            <div class="row">
                                                <div class="col-5 text-start">
                                                    <div class="icon icon-shape text-center border-radius-2xl">
                                                        <img :src="'_homepage/icon/potassium.png'" height="100%"
                                                            width="100%">
                                                    </div>
                                                </div>
                                                <div class="col-7 text-justify" v-if="sensorData">
                                                    <span class="text-black text-sm">{{ sensorData.soil_kalium }}</span><br>
                                                    <span class="text-black" style="font-size: small; font-weight: bold;">mg/kg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                ,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

export default {
    name: 'DashboardSensorComponent',
    data() {
        return {
            sensorData: null,
            fetchDataInterval: null,
            fetchDataSensorInterval: null,
            temperatureChart: null,
            humidityChart: null,
            temperature: null,
            humidity: null,
            timestamps: [],
        };
    },
    mounted() {
        this.fetchData();
        this.fetchSensorData();
        // this.renderTemperatureChart();
        // this.renderHumidityChart();
        this.fetchDataInterval = setInterval(this.fetchData, 1000);
        this.fetchDataSensorInterval = setInterval(this.fetchSensorData, 1000);
    },
    beforeUnmount() {
        if (this.fetchDataInterval) clearInterval(this.fetchDataInterval);
        if (this.fetchSensorDataInterval) clearInterval(this.fetchSensorDataInterval);
        // if (this.temperatureChart) this.temperatureChart.destroy();
        // if (this.humidityChart) this.humidityChart.destroy();
    },
    computed: {
        pm1_0Img() {
            if (this.sensorData.pm1_0 >= 0 && this.sensorData.pm1_0 <= 10) {
                return "_homepage/icon/baik.png";
            } else if (this.sensorData.pm1_0 >= 11 && this.sensorData.pm1_0 <= 20) {
                return "_homepage/icon/sedang.png";
            } else if (this.sensorData.pm1_0 >= 21 && this.sensorData.pm1_0 <= 35) {
                return "_homepage/icon/tidak_sehat.png";
            } else {
                return "_homepage/icon/sangat_tidak_sehat.png";
            }
        },
        pm2_5Img() {
            if (this.sensorData.pm2_5 >= 0 && this.sensorData.pm2_5 <= 15.5) {
                return "_homepage/icon/baik.png";
            } else if (this.sensorData.pm2_5 >= 15.6 && this.sensorData.pm2_5 <= 55.4) {
                return "_homepage/icon/sedang.png";
            } else if (this.sensorData.pm2_5 >= 55.5 && this.sensorData.pm2_5 <= 150.4) {
                return "_homepage/icon/tidak_sehat.png";
            } else if (this.sensorData.pm2_5 >= 150.5 && this.sensorData.pm2_5 <= 250.4) {
                return "_homepage/icon/sangat_tidak_sehat.png";
            } else {
                return "_homepage/icon/berbahaya.png";
            }
        },
        pm10Img() {
            if (this.sensorData.pm10 >= 0 && this.sensorData.pm10 <= 50) {
                return "_homepage/icon/baik.png";
            } else if (this.sensorData.pm10 >= 50 && this.sensorData.pm10 <= 150) {
                return "_homepage/icon/sedang.png";
            } else if (this.sensorData.pm10 >= 151 && this.sensorData.pm10 <= 350) {
                return "_homepage/icon/tidak_sehat.png";
            } else if (this.sensorData.pm10 >= 351 && this.sensorData.pm10 <= 420) {
                return "_homepage/icon/sangat_tidak_sehat.png";
            } else {
                return "_homepage/icon/berbahaya.png";
            }
        },
        cuacaImg() {
            if ((this.sensorData.lux >= 0 && this.sensorData.lux <= 10) && (this.sensorData.rain_hour == 0.0)) {
                return "_homepage/icon/malam.png";
            } else if ((this.sensorData.lux >= 0 && this.sensorData.lux <= 10) && (this.sensorData.rain_hour == 0.1 && this.sensorData.rain_hour >= 100)) {
                return "_homepage/icon/malam_hujan.png";
            } else if ((this.sensorData.lux >= 11 && this.sensorData.lux <= 50) && (this.sensorData.rain_hour == 0.0)) {
                return "_homepage/icon/sunset.png";
            } else if ((this.sensorData.lux >= 51 && this.sensorData.lux <= 400) && (this.sensorData.rain_hour == 0.0)) {
                return "_homepage/icon/mendung_petir.png";
            } else if ((this.sensorData.lux >= 51 && this.sensorData.lux <= 400) && (this.sensorData.rain_hour >= 0.1 && this.sensorData.rain_hour <= 2.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 51 && this.sensorData.lux <= 400) && (this.sensorData.rain_hour >= 2.6 && this.sensorData.rain_hour <= 7.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 51 && this.sensorData.lux <= 400) && (this.sensorData.rain_hour >= 7.6 && this.sensorData.rain_hour <= 50.0)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 51 && this.sensorData.lux <= 400) && (this.sensorData.rain_hour >= 50.1 && this.sensorData.rain_hour <= 100)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 51 && this.sensorData.lux <= 400) && (this.sensorData.rain_hour >= 100.1)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 401 && this.sensorData.lux <= 1000) && (this.sensorData.rain_hour == 0.0)) {
                return "_homepage/icon/mendung.png";
            } else if ((this.sensorData.lux >= 401 && this.sensorData.lux <= 1000) && (this.sensorData.rain_hour >= 0.1 && this.sensorData.rain_hour <= 2.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 401 && this.sensorData.lux <= 1000) && (this.sensorData.rain_hour >= 2.6 && this.sensorData.rain_hour <= 7.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 401 && this.sensorData.lux <= 1000) && (this.sensorData.rain_hour >= 7.6 && this.sensorData.rain_hour <= 50.0)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 401 && this.sensorData.lux <= 1000) && (this.sensorData.rain_hour >= 50.1 && this.sensorData.rain_hour <= 100)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 401 && this.sensorData.lux <= 1000) && (this.sensorData.rain_hour >= 100.1)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 1001 && this.sensorData.lux <= 5000) && (this.sensorData.rain_hour == 0.0)) {
                return "_homepage/icon/mendung.png";
            } else if ((this.sensorData.lux >= 1001 && this.sensorData.lux <= 5000) && (this.sensorData.rain_hour >= 0.1 && this.sensorData.rain_hour <= 2.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 1001 && this.sensorData.lux <= 5000) && (this.sensorData.rain_hour >= 2.6 && this.sensorData.rain_hour <= 7.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 1001 && this.sensorData.lux <= 5000) && (this.sensorData.rain_hour >= 7.6 && this.sensorData.rain_hour <= 50.0)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 1001 && this.sensorData.lux <= 5000) && (this.sensorData.rain_hour >= 50.1 && this.sensorData.rain_hour <= 100)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 1001 && this.sensorData.lux <= 5000) && (this.sensorData.rain_hour >= 100.1)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 5001 && this.sensorData.lux <= 25000) && (this.sensorData.rain_hour == 0.0)) {
                return "_homepage/icon/cerah_berawan.png";
            } else if ((this.sensorData.lux >= 5001 && this.sensorData.lux <= 25000) && (this.sensorData.rain_hour >= 0.1 && this.sensorData.rain_hour <= 2.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 5001 && this.sensorData.lux <= 25000) && (this.sensorData.rain_hour >= 2.6 && this.sensorData.rain_hour <= 7.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 5001 && this.sensorData.lux <= 25000) && (this.sensorData.rain_hour >= 7.6 && this.sensorData.rain_hour <= 50.0)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 5001 && this.sensorData.lux <= 25000) && (this.sensorData.rain_hour >= 50.1 && this.sensorData.rain_hour <= 100)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 5001 && this.sensorData.lux <= 25000) && (this.sensorData.rain_hour >= 100.1)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 25001 && this.sensorData.lux <= 100000) && (this.sensorData.rain_hour == 0.0)) {
                return "_homepage/icon/cerah.png";
            } else if ((this.sensorData.lux >= 25001 && this.sensorData.lux <= 100000) && (this.sensorData.rain_hour >= 0.1 && this.sensorData.rain_hour <= 2.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 25001 && this.sensorData.lux <= 100000) && (this.sensorData.rain_hour >= 2.6 && this.sensorData.rain_hour <= 7.5)) {
                return "_homepage/icon/hujan.png";
            } else if ((this.sensorData.lux >= 25001 && this.sensorData.lux <= 100000) && (this.sensorData.rain_hour >= 7.6 && this.sensorData.rain_hour <= 50.0)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 25001 && this.sensorData.lux <= 100000) && (this.sensorData.rain_hour >= 50.1 && this.sensorData.rain_hour <= 100)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 25001 && this.sensorData.lux <= 100000) && (this.sensorData.rain_hour >= 100.1)) {
                return "_homepage/icon/hujan_lebat.png";
            } else if ((this.sensorData.lux >= 100001)) {
                return "_homepage/icon/panas_terik.png";
            }
        },
        dateCuaca() {
            const createdAt = new Date(this.sensorData.created_at);
            const date = createdAt.toLocaleDateString("en-US", {
                month: "short", // Menampilkan bulan singkat seperti "Dec"
                day: "2-digit",
            });
            const time = createdAt.toLocaleTimeString("en-US", {
                hour: "2-digit",
                minute: "2-digit",
                hour12: true, // Format 12 jam (AM/PM)
            });
            const formattedDatetime = `${date}, ${time.toLowerCase()}`;
            return formattedDatetime;
        }
    },
    methods: {
        fetchData() {
            axios
                .get('https://iot.gipculstudio.id/api/getSensors')
                .then(response => {
                    if (response.data.success) {
                        this.sensorData = response.data.data;
                    } else {
                        console.error('API Error:', response.data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching sensor data:', error);
                });
        },
        fetchSensorData() {
            axios
                .get('api/getSensors')
                .then(response => {
                    if (response.data.success) {
                        const sensorData = response.data.data;
                        // this.temperature = parseFloat(sensorData.temperature);
                        // this.humidity = parseFloat(sensorData.humidity);
                        // this.timestamps.push(new Date(sensorData.created_at).toLocaleTimeString());
                        this.updateCharts(
                            parseFloat(sensorData.temperature),
                            parseFloat(sensorData.humidity),
                            new Date(sensorData.created_at).toLocaleTimeString()
                        );
                    } else {
                        console.error('API Error:', response.data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching sensor data:', error);
                });
        },
        // renderTemperatureChart() {
        //     const ctx = document.getElementById('temperatureChart').getContext('2d');
        //     this.temperatureChart = new Chart(ctx, {
        //         type: 'line',
        //         data: {
        //             labels: this.timestamps, // Time labels
        //             datasets: [
        //                 {
        //                     label: 'Temperature (°C)',
        //                     data: [], // Only temperature values
        //                     backgroundColor: 'rgba(75, 192, 192, 0.2)',
        //                     borderColor: 'rgba(75, 192, 192, 1)',
        //                     borderWidth: 1,
        //                 },
        //             ],
        //         },
        //         options: {
        //             responsive: true,
        //             plugins: {
        //                 legend: {
        //                     display: true,
        //                 },
        //             },
        //             scales: {
        //                 x: {
        //                     title: {
        //                         display: true,
        //                         text: 'Timestamp',
        //                     },
        //                 },
        //                 y: {
        //                     title: {
        //                         display: true,
        //                         text: 'Temperature (°C)',
        //                     },
        //                     beginAtZero: true,
        //                 },
        //             },
        //         },
        //     });
        // },
        // renderHumidityChart() {
        //     const humidity = document.getElementById('humidityChart').getContext('2d');
        //     this.humidityChart = new Chart(humidity, {
        //         type: 'line',
        //         data: {
        //             labels: this.timestamps, // Time labels
        //             datasets: [
        //                 {
        //                     label: 'Humidity (%)',
        //                     data: [], // Only humidity values
        //                     backgroundColor: 'rgba(206, 14, 14, 0.2)',
        //                     borderColor: 'rgba(206, 14, 14, 1)',
        //                     borderWidth: 1,
        //                 },
        //             ],
        //         },
        //         options: {
        //             responsive: true,
        //             plugins: {
        //                 legend: {
        //                     display: true,
        //                 },
        //             },
        //             scales: {
        //                 x: {
        //                     title: {
        //                         display: true,
        //                         text: 'Timestamp',
        //                     },
        //                 },
        //                 y: {
        //                     title: {
        //                         display: true,
        //                         text: 'Humidity (%)',
        //                     },
        //                     beginAtZero: true,
        //                 },
        //             },
        //         },
        //     });
        // },
        // updateCharts(temperature, humidity, timestamp) {
        //     this.timestamps.push(timestamp);

        //     // Update Temperature Chart
        //     if (this.temperatureChart) {
        //         this.temperatureChart.data.labels.push(timestamp);
        //         this.temperatureChart.data.datasets[0].data.push(temperature);
        //         this.temperatureChart.update();
        //     }

        //     // Update Humidity Chart
        //     if (this.humidityChart) {
        //         this.humidityChart.data.labels.push(timestamp);
        //         this.humidityChart.data.datasets[0].data.push(humidity);
        //         this.humidityChart.update();
        //     }
        // },
    }
};
</script>


<style scoped>
canvas {
    max-width: 100%;
    max-height: 400px;
}
</style>
