@extends('administrator.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-value">{{ Auth::user()->name }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form method="post" action="{{ route('index.update.profile') }}" class="needs-validation"
                                novalidate>
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Auth::user()->name }}" required>
                                            <div class="invalid-feedback">
                                                Please fill in the name
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}" required>
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Phone</label>
                                            <input type="tel" class="form-control" name="telephone"
                                                value="{{ Auth::user()->telephone }}">
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Password Baru</label>
                                            <input type="password" class="form-control" name="password" required>
                                            <div class="invalid-feedback">
                                                Please fill in the password
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Konfirmasi Password Baru</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                required>
                                            <div class="invalid-feedback">
                                                Please fill in the password confirmation
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
