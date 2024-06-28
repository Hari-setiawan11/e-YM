@extends('administrator.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content" style="padding-bottom: 10px;">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="container_batang">
                <div class="card">
                    <h2>Jumlah Pemasukan Uang Donasi Per Bulan</h2>
                    <div class="chart-container">
                        <canvas id="donationBarChart" width="1500" height="600"></canvas>
                    </div>
                </div>
            </div>
            <script>
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
                                    beginAtZero: true,
                                    min: 1000000, // Minimum 1 juta
                                    max: 10000000, // Maksimum 10 juta
                                    ticks: {
                                        // Format nilai dengan titik sebagai pemisah ribuan
                                        callback: function(value, index, values) {
                                            return 'Rp' + value.toLocaleString('id-ID');
                                        }
                                    }
                                }
                            }
                        }
                    });
                });
            </script>

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
                @can('read-dashboard-user')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Jumlah Donasi</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalDonasi }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
                @can('read-dashboard-admin')
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
                @endcan
                @can('read-dashboard-admin')
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
                @endcan
                @can('read-dashboard-admin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Jumlah Arsip</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalArsip }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
                @can('read-dashboard-admin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-list"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Jumlah Program</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalProgram }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
                {{-- @can('read-dashboard-admin')
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
                @endcan --}}
            </div>
        </section>
    </div>
@endsection
