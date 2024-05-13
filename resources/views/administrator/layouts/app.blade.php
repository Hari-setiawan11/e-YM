@extends('administrator.layouts.base')

@section('app')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('administrator.layouts.partials.header')
            @include('administrator.layouts.partials.sidebar')
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>

            @include('administrator.layouts.partials.footer')
        </div>
    </div>
@endsection
