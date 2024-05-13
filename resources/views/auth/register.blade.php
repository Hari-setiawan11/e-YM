@extends('administrator.layouts.base')

@section('app')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Reister</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('registration') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your name.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Please fill in your username.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="3" required>
                                        <div class="invalid-feedback">
                                            Please fill in a valid email address.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="4" required>
                                        <div class="invalid-feedback">
                                            Please fill in a password.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmation-password">Konfirmasi Password</label>
                                        <input id="confirmation-password" type="password" class="form-control"
                                            name="confirmation-password" tabindex="5" required>
                                        <div class="invalid-feedback">
                                            Please fill in the confirmation password.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="6">
                                            Register
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-5 text-muted text-center">
                                    Don't have an account? <a href="{{ route('auth') }}">Login</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
