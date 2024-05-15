@extends('administrator.layouts.app')

@section('title')
    <title>Daftar Donasi | e-YM</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row pt-2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Donasi</h4>
                                <div class="card-header-form">
                                    <div class="ml-auto mb-2">
                                        <a href="{{ route('index.create.datadonasi') }}" style="float: right;"
                                            class="btn btn-round btn-primary mb-3">Tambah</a>
                                    </div>
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>E-mail</th>
                                            <th class="text-center">Rekap</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        <tbody>
                                            @if ($users->count() > 0)
                                                @foreach ($users as $index => $user)
                                                    @if ($index >= 2)
                                                        <tr>
                                                            <td class="align-middle">{{ $index + 1 }}</td>
                                                            <td class="align-middle">{{ $user->name }}</td>
                                                            <td class="align-middle">{{ $user->alamat }}</td>
                                                            <td class="align-middle">{{ $user->telephone }}</td>
                                                            <td class="align-middle">{{ $user->email }}</td>
                                                            <td class="align-middle">
                                                                <div class="text-center">
                                                                    <!-- Menggunakan flexbox untuk membuat ikon sejajar -->
                                                                    <a href="#" class="btn btn-primary ml-2">
                                                                        <!-- Gunakan class ml-2 untuk margin kiri -->
                                                                        <i class="fas fa-database"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle">
                                                                <div class="d-flex justify-content-center">
                                                                    <!-- Menggunakan flexbox untuk membuat ikon sejajar -->
                                                                    <a href="#" class="btn btn-primary ml-2">
                                                                        <!-- Gunakan class ml-2 untuk margin kiri -->
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>

                                                                    <!-- Form untuk menghapus data -->
                                                                    <form
                                                                        action="{{ route('index.destroy.datadonasi', $user->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger ml-2">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="7">Data Donasi Belum Diisi</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('script')
    {{-- Datatable JS --}}
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

    {{-- Modal JS --}}
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
