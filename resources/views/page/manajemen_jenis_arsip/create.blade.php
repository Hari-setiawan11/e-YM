@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">



            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Jenis Arsip</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Nama Jenis Arsip">
                                    @error('nama')
                                        <div id="nama" class="form-text"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input id="keterangan" type="text"
                                        class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                        placeholder="keterangan">
                                    @error('keterangan')
                                        <div id="keterangan" class="form-text"></div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah Jenis Arsip
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
