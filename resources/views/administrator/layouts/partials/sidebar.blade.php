<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            {{-- <a href="index.html">e-YM</a> --}}
            <img src="{{ asset('assets/img/e-ym/eym.png') }}" width="120" class="img-fluid mb-2" alt="">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">YM</a>
        </div>
        <ul class="sidebar-menu">
            @can('read-dashboard')
                <li class="menu-header">Dashboard</li>
                <li class="{{ \Route::is('apps.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('apps.dashboard') }}" class="nav-link"><i
                            class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
            @endcan

            <li class="menu-header">Kegiatan</li>

            @can('read-form-donasi')
                <li class="{{ \Route::is('form.create.donasi') ? 'active' : '' }}">
                    <a href="{{ route('form.create.donasi') }}" class="nav-link"><i class="far fa-file-alt"></i>
                        <span>Form Donasi</span></a>
                </li>
            @endcan

            @can('read-rekap-donasi')
                <li class="{{ \Route::is('form.index.donasi') ? 'active' : '' }}">
                    <a href="{{ route('form.index.donasi') }}" class="nav-link"><i class="far fa-file-alt"></i>
                        <span>Daftar Donasi</span></a>
                </li>
            @endcan

            @php
                $activeRoutes = [
                    'index.view.distribusi',
                    'index.create.distribusi',
                    'index.edit.distribusi',
                    'index.view.distribusibarang',
                    'index.create.distribusibarang',
                ];
                $activeRoutesDropdown = [
                    'index.view.penyaluran',
                    'index.view.kprogram',
                    'index.create.penyaluran',
                    'index.edit.penyaluran',
                    'index.create.kprogram',
                    'index.edit.kprogram',
                ];
            @endphp
            @can('read-distribusi')
                <li class="{{ in_array(\Route::currentRouteName(), $activeRoutes) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('index.view.distribusi') }}">
                        <i class="fas fa-box-open"></i>
                        <span>Distribusi</span>
                    </a>
                </li>
            @endcan
            @can('read-program')
                <li
                    class="{{ \Route::is('index.view.program') || \Route::is('index.create.program') || \Route::is('index.edit.program') ? 'active' : '' }}">
                    <a href="{{ route('index.view.program') }}" class="nav-link"><i class="far fa-file-alt"></i>
                        <span>Program</span></a>
                </li>
            @endcan
            @can('read-jenis-arsip')
                <li
                    class="{{ \Route::is('index.view') || \Route::is('index.create') || \Route::is('index.edit') ? 'active' : '' }}">
                    <a href="{{ route('index.view') }}" class="nav-link"><i class="fas fa-folder-open"></i>
                        <span>Jenis Arsip</span></a>
                </li>
            @endcan

            @can('read-arsip')
                <li
                    class="{{ \Route::is('index.view.arsip') || \Route::is('index.create.arsip') || \Route::is('index.edit.arsip') ? 'active' : '' }}">
                    <a href="{{ route('index.view.arsip') }}" class="nav-link"><i class="fas fa-folder"></i></i>
                        <span>Arsip</span></a>
                </li>
            @endcan

            @can('read-data-user')
                <li
                    class="{{ \Route::is('index.view.datauser') || \Route::is('index.create.datauser') || \Route::is('index.edit.datauser') ? 'active' : '' }}">
                    <a href="{{ route('index.view.datauser') }}" class="nav-link"><i class="fas fa-donate"></i>
                        <span>Data Donatur</span></a>
                </li>
            @endcan

            @can('read-kelola-konten')
                <li class="dropdown{{ \Route::is(...$activeRoutesDropdown) ? ' active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Kelola Konten</span></a>
                    <ul class="dropdown-menu">
                        <li
                            class="{{ \Route::is('index.view.penyaluran') || \Route::is('index.create.penyaluran') || \Route::is('index.edit.penyaluran') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('index.view.penyaluran') }}">Konten Penyaluran</a>
                        </li>
                        <li
                            class="{{ \Route::is('index.view.kprogram') || \Route::is('index.create.kprogram') || \Route::is('index.edit.kprogram') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('index.view.kprogram') }}">Konten Program</a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </aside>
</div>
