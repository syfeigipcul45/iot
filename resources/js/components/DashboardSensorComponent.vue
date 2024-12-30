<template>
    <div>
        <div class="container-fluid py-4">
            <div class="row">
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
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="card">
                                <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <div class="icon icon-shape text-center border-radius-2xl">
                                                <img :src="'_homepage/icon/pm1_0.png'" height="120px" width="120px">
                                            </div>
                                        </div>
                                        <div class="col-4 text-center" v-if="sensorData">
                                            <img :src="pm1_0Img" height="96px" width="96px"><br>
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
                                        <span class="text-black text-sm">Particulate Matter (PM1.0) adalah Partikel
                                            udara yang berukuran kurang dari
                                            1 µm (mikrometer).</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mt-4 mt-md-0">
                            <div class="card">
                                <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <div class="icon icon-shape text-center border-radius-2xl">
                                                <img :src="'_homepage/icon/pm2_5.png'" height="120px" width="120px">
                                            </div>
                                        </div>
                                        <div class="col-4 text-center" v-if="sensorData">
                                            <img :src="pm2_5Img" height="96px" width="96px"><br>
                                            <span class="text-black text-sm">{{ sensorData.pm2_5 }} µm/m³</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <span class="text-black text-sm">Particulate Matter (PM2.5) adalah partikel
                                            udara yang berukuran lebih kecil
                                            dari 2.5 µm (mikrometer).</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mt-4 mt-md-0">
                            <div class="card">
                                <!-- <span class="mask bg-light opacity-10 border-radius-lg"></span> -->
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <div class="icon icon-shape text-center border-radius-2xl">
                                                <img :src="'_homepage/icon/pm10.png'" height="120px" width="120px">
                                            </div>
                                        </div>
                                        <div class="col-4 text-center" v-if="sensorData">
                                            <img :src="pm10Img" height="96px" width="96px"><br>
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
                                        <span class="text-black text-sm">Particulate Matter (PM10) adalah Partikel udara
                                            yang berukuran lebih kecil
                                            dari 10 µm (mikrometer).</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <p class="mb-1 pt-2 text-bold">Built by developers</p>
                                        <h5 class="font-weight-bolder">Soft UI Dashboard</h5>
                                        <p class="mb-5">From colors, cards, typography to complex elements, you will
                                            find the full documentation.</p>
                                        <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                            href="javascript:;">
                                            Read More
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                    <div class="bg-primary border-radius-lg h-100">
                                        <!-- <img src="../assets/img/shapes/waves-white.svg"
                                            class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves"> -->
                                        <div
                                            class="position-relative d-flex align-items-center justify-content-center h-100">
                                            <!-- <img class="w-100 position-relative z-index-2 pt-4"
                                                src="../assets/img/illustrations/rocket-white.png" alt="rocket"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="">
                            <span class="mask bg-gradient-dark"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-white font-weight-bolder mb-4 pt-2">Work with the rockets</h5>
                                <p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It
                                    is all about who take the opportunity first.</p>
                                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="javascript:;">
                                    Read More
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">
                            <h6>Sales overview</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success"></i>
                                <span class="font-weight-bold">4% more</span> in 2021
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
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
        this.renderTemperatureChart();
        this.renderHumidityChart();
        this.fetchDataInterval = setInterval(this.fetchData, 1000);
        this.fetchDataSensorInterval = setInterval(this.fetchSensorData, 1000);
    },
    beforeUnmount() {
        if (this.fetchDataInterval) clearInterval(this.fetchDataInterval);
        if (this.fetchSensorDataInterval) clearInterval(this.fetchSensorDataInterval);
        if (this.temperatureChart) this.temperatureChart.destroy();
        if (this.humidityChart) this.humidityChart.destroy();
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
        }
    },
    methods: {
        fetchData() {
            axios
                .get('api/getSensors')
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
        renderTemperatureChart() {
            const ctx = document.getElementById('temperatureChart').getContext('2d');
            this.temperatureChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: this.timestamps, // Time labels
                    datasets: [
                        {
                            label: 'Temperature (°C)',
                            data: [], // Only temperature values
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                        },
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Timestamp',
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Temperature (°C)',
                            },
                            beginAtZero: true,
                        },
                    },
                },
            });
        },
        renderHumidityChart() {
            const humidity = document.getElementById('humidityChart').getContext('2d');
            this.humidityChart = new Chart(humidity, {
                type: 'line',
                data: {
                    labels: this.timestamps, // Time labels
                    datasets: [
                        {
                            label: 'Humidity (%)',
                            data: [], // Only humidity values
                            backgroundColor: 'rgba(206, 14, 14, 0.2)',
                            borderColor: 'rgba(206, 14, 14, 1)',
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                        },
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Timestamp',
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Humidity (%)',
                            },
                            beginAtZero: true,
                        },
                    },
                },
            });
        },
        updateCharts(temperature, humidity, timestamp) {
            this.timestamps.push(timestamp);

            // Update Temperature Chart
            if (this.temperatureChart) {
                this.temperatureChart.data.labels.push(timestamp);
                this.temperatureChart.data.datasets[0].data.push(temperature);
                this.temperatureChart.update();
            }

            // Update Humidity Chart
            if (this.humidityChart) {
                this.humidityChart.data.labels.push(timestamp);
                this.humidityChart.data.datasets[0].data.push(humidity);
                this.humidityChart.update();
            }
        },
    }
};
</script>


<style scoped>
canvas {
    max-width: 100%;
    max-height: 400px;
}
</style>
