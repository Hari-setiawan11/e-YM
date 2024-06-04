@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content" style="padding-bottom: 10px;">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>

            {{-- <div class="container_grafik">
                <div class="card card_dashboard">
                    <h2>Jumlah Barang</h2>
                    <canvas id="barangChart" width="300" height="300"></canvas>
                </div>
            </div>

            <script>
                const ctx = document.getElementById('barangChart').getContext('2d');
                const barangChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Barang A', 'Barang B', 'Barang C', 'Barang D', 'Barang E'],
                        datasets: [{
                            label: 'Jumlah Barang',
                            data: [300, 50, 100, 40, 120],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += context.raw;
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            </script> --}}

            {{-- <div class="container_grafik">
                <div class="card card_dashboard">
                    <h2>Jumlah Penerima Manfaat</h2>
                    <div class="chart-container">
                        <canvas id="penerimaManfaatChart" width="300" height="300"></canvas>
                        <div class="chart-text" id="chartText"></div>
                    </div>
                </div>
            </div>

            <script>
                const data = {
                    labels: ['Penerima Manfaat'],
                    datasets: [{
                        data: [450], // Jumlah penerima manfaat
                        backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                        borderColor: ['rgba(54, 162, 235, 1)'],
                        borderWidth: 1
                    }]
                };

                const options = {
                    responsive: true,
                    plugins: {
                        datalabels: {
                            display: false
                        },
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    }
                };

                const ctx = document.getElementById('penerimaManfaatChart').getContext('2d');
                const penerimaManfaatChart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: options
                });

                document.getElementById('chartText').innerText = data.datasets[0].data[0];
            </script> --}}

            <div class="container_batang">
                <div class="card">
                    <h2>Jumlah Pemasukan Uang Donasi Per Bulan</h2>
                    <div class="chart-container">
                        <canvas id="donationBarChart" width="1500" height="600"></canvas>
                    </div>
                </div>
            </div>

            {{-- <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Data contoh untuk pemasukan donasi per bulan
                    const donationData = @json($donationData);
                    const months = @json($months);

                    const ctx = document.getElementById('donationBarChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Jumlah Pemasukan Uang Donasi',
                                data: donationData,
                                backgroundColor: '#6777EF',
                                borderColor: '#2E3192',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script> --}}

            {{-- <div class=" row row_dashboard">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card card_dashboard">
                        <div class="card-body_dashboard">
                            <img style="" src="{{ asset('assets/img/dashboard.png') }}" alt="gambar">
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row_dashboard" style="margin-top: -80px;">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Distribusi</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalDistribusi }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Donatur</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalGuest }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jummlah Arsip</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalArsip }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Barang</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalBarang }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
