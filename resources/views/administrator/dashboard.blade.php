@extends('administrator.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>

            <div class="container-fluid">
                @can('read-dashboard-admin')
                    <div class="card justify-content-start">
                        <div class="row">
                            <div class="col-lg-8">
                                <!-- Grafik Batang Total Donasi Admin -->
                                <canvas id="totalDonasiAdminChart" width="1500" height="710">></canvas>
                            </div>
                            <div class="col-lg-4">
                                <!-- Jumlah donasi -->
                                <div class="card card-statistic-1">
                                    <div class="card-wrap">
                                        <div class="card-icon bg-danger">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="card-header">
                                            <h4>Jumlah Donasi</h4>
                                        </div>
                                        <div class="card-body">
                                            Rp.{{ $totalDonasiAdminFormatted }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>

            <div class="container-fluid">
                @can('read-dashboard-user')
                    <div class="card justify-content-start">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="text-center">Jumlah Pemasukan Uang Donasi Per Bulan</h2>
                                <!-- Grafik pemasukan uang donasi per bulan -->
                                <div class="card card-statistic-1">
                                    <canvas id="donationBarChart" width="1500" height="600"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <!-- Jumlah donasi -->
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-danger">
                                        <i class="far fa-file"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Jumlah Donasi</h4>
                                        </div>
                                        <div class="card-body">
                                            Rp.{{ $totalDonasiFormatted }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>

            <div class="row_dashboard" style="margin-top: -80px;">
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
                                    <h4>Jumlah Program</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalProgram }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan --}}
            </div>

            <script>
                // Tentukan variabel JavaScript dan berikan nilai dari variabel PHP
                const donationData = {!! json_encode($donationData) !!};
                const months = {!! json_encode($months) !!};
                const totalDonasiAdmin = {!! json_encode($totalDonasiAdmin) !!};
            </script>

            <!-- Sertakan file JavaScript eksternal Anda -->
            <script src="{{ asset('js/chart.js') }}"></script>
        </section>
    </div>
@endsection
