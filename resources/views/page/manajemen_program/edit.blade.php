@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Program</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.update.program', $Program->id) }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Nama Jenis Arsip" value="{{ $Program->nama }}">
                                    @error('nama')
                                        <div id="nama" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input id="deskripsi" type="text"
                                        class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                        placeholder="deskripsi" value="{{ $Program->deskripsi }}">
                                    @error('deskripsi')
                                        <div id="deskripsi" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="file" class="form-label">File</label>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                        id="file" name="file">
                                    @error('file')
                                        <div id="file" class="form-file">{{ $message }}</div>
                                    @enderror
                                    @if ($Program->file)
                                        <small id="fileHelp" class="form-text text-muted">File yang diunggah:
                                            {{ $Program->file }}</small>
                                    @else
                                        <small id="fileHelp" class="form-text text-muted">Tidak ada file yang
                                            diunggah</small>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah Program
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
