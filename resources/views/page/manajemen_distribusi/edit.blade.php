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
                            <form method="POST" action="{{ route('index.update.distribusi', $distribusi->id) }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label for="program">Program</label>
                                    <select id="programs_id" class="form-control @error('programs_id') is-invalid @enderror"
                                        name="programs_id" value="{{ $distribusi->nama }}">
                                        <option value="{{ $distribusi->programs_id }}">{{ $distribusi->program->nama }}
                                        </option>
                                        @foreach ($programs as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('programs_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input id="tanggal" type="date"
                                        class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                        placeholder="tanggal" value="{{ $distribusi->tanggal }}">
                                    @error('tanggal')
                                        <div id="tanggal" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input id="tempat" type="text"
                                        class="form-control @error('tempat') is-invalid @enderror" name="tempat"
                                        placeholder="Tempat" value="{{ $distribusi->tempat }}">
                                    @error('tempat')
                                        <div id="tempat" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="penerima_manfaat">Penerima Manfaat</label>
                                    <input id="penerima_manfaat" type="text"
                                        class="form-control @error('penerima_manfaat') is-invalid @enderror"
                                        name="penerima_manfaat" placeholder="Penerima Manfaat"
                                        value="{{ $distribusi->penerima_manfaat }}">
                                    @error('penerima_manfaat')
                                        <div id="penerima_manfaat" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="anggaran">Anggaran</label>
                                    <input id="anggaran" type="text"
                                        class="form-control @error('anggaran') is-invalid @enderror" name="anggaran"
                                        placeholder="Anggaran" value="{{ $distribusi->anggaran }}">
                                    @error('anggaran')
                                        <div id="anggaran" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pengeluaran">Pengeluaran</label>
                                    <input id="pengeluaran" type="text"
                                        class="form-control @error('pengeluaran') is-invalid @enderror" name="pengeluaran"
                                        placeholder="Pengeluaran" value="{{ $distribusi->pengeluaran }}">
                                    @error('pengeluaran')
                                        <div id="pengeluaran" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="sisa">Sisa</label>
                                    <input id="sisa" type="text"
                                        class="form-control @error('sisa') is-invalid @enderror" name="sisa"
                                        placeholder="Sisa" value="{{ $distribusi->sisa }}">
                                    @error('sisa')
                                        <div id="sisa" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="file" class="form-label">file</label>
                                    <input type="file" class="form-control" id="file" name="file"
                                        placeholder="{{ $distribusi->file ? $distribusi->file : 'Tidak ada file yang diunggah' }}"
                                        value="{{ $distribusi->file }}">
                                    @error('file')
                                        <div id="file" class="form-file">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah Distribusi
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
