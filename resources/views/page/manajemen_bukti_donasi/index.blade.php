@extends('administrator.layouts.app')

@section('title')
    <title>Bukti Donasi | e-YM</title>
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
                                <h4>Bukti Donasi</h4>
                                <div class="card-header-form">
                                    <div class="ml-auto mb-2">
                                        <a href="{{ route('index.create.bukti') }}" style="float: right;"
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
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>File</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                        <tbody>
                                            @if ($buktidonasis->count() > 0)
                                                @foreach ($buktidonasis as $data)
                                                    <tr>
                                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                                        <td class="align-middle">{{ $data->tanggal }}</td>
                                                        <td class="align-middle">{{ $data->nominal }}</td>
                                                        <td class="align-middle">{{ $data->deskripsi }}</td>
                                                        <td class="align-middle">{{ $data->datadonasi->nama }}</td>
                                                        <td class="align-middle">
                                                            @if ($data->file)
                                                                <a
                                                                    href="{{ asset('storage/buktidonasis/' . $data->file) }}">
                                                                    <i class="fas fa-file-alt"
                                                                        style="font-size:
                                                                20px;"></i>
                                                                </a>
                                                            @else
                                                                <i>No file uploaded.</i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <!-- Menggunakan flexbox untuk membuat ikon sejajar -->
                                                                <a href="{{ route('index.edit.arsip', $data->id) }}"
                                                                    class="btn btn-primary ml-2">
                                                                    <!-- Gunakan class ml-2 untuk margin kiri -->
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a href="{{ route('index.destroy.arsip', $data->id) }}"
                                                                    class="btn btn-danger ml-2">
                                                                    <!-- Gunakan class ml-2 untuk margin kiri -->
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="5">Arsip Belum Diisi</td>
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
