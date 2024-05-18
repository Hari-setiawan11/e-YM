@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">

            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Konten Penyaluran</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.update.penyaluran', $KontenPenyaluran->id) }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Nama" value="{{ $KontenPenyaluran->nama }}">
                                    @error('nama')
                                        <div id="nama" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input id="keterangan" type="text"
                                        class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                        placeholder="Keterangan" value="{{ $KontenPenyaluran->keterangan }}">
                                    @error('keterangan')
                                        <div id="keterangan" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        placeholder="{{ $KontenPenyaluran->foto ? $KontenPenyaluran->foto : 'Tidak ada file yang diunggah' }}"
                                        value="{{ $KontenPenyaluran->foto }}">
                                    @error('foto')
                                        <div id="foto" class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah
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
