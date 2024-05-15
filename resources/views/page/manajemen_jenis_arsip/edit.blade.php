@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">

            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Jenis Arsip</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.update', $jenisArsip->id) }}">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Nama Jenis Arsip" value="{{ $jenisArsip->nama }}">
                                    @error('nama')
                                        <div id="nama" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input id="keterangan" type="text"
                                        class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                        placeholder="keterangan" value="{{ $jenisArsip->keterangan }}">
                                    @error('keterangan')
                                        <div id="keterangan" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan Jenis Arsip
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
