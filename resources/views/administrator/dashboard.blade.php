@extends('administrator.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content" style="padding-bottom: 10px;">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class=" row row_dashboard">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card card_dashboard">
                        <div class="card-body_dashboard">
                            <img style="" src="{{ asset('assets/img/dashboard.png') }}" alt="gambar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row_dashboard_card">
                @can('read-dashboard-admin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('index.view.distribusi') }}" class="card card-statistic-1 text-decoration-none">
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
                                .
                            </div>
                        </a>
                    </div>
                @endcan
                @can('read-dashboard-admin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('index.view.datauser') }}" class="card card-statistic-1 text-decoration-none">
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
                        </a>
                    </div>
                @endcan
                @can('read-dashboard-admin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('index.view.arsip') }}" class="card card-statistic-1 text-decoration-none">
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
                        </a>
                    </div>
                @endcan
                @can('read-dashboard-admin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('form.index.donasi') }}" class="card card-statistic-1 text-decoration-none">
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
                        </a>
                    </div>
                @endcan
                @can('read-dashboard-user')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('form.index.donasi') }}" class="card card-statistic-1 text-decoration-none">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-file"></i>
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
                        </a>
                    </div>
                @endcan
            </div>
        </section>
    </div>
@endsection
