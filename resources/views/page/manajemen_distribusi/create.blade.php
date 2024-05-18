@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">



            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Distribusi</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.store.distribusi') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="programs_id">Program</label>
                                    <select id="programs_id" class="form-control @error('programs_id') is-invalid @enderror"
                                        name="programs_id">
                                        <option value="" selected disabled>Pilih Program</option>
                                        @foreach ($program as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('programs_id')
                                        <div id="programs_id" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input id="tanggal" type="text"
                                        class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                        placeholder="Tanggal">
                                    @error('tanggal')
                                        <div id="tanggal" class="form-text"></div>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input id="tanggal" type="date"
                                        class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
                                    @error('tanggal')
                                        <div id="tanggal" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input id="tempat" type="text"
                                        class="form-control @error('tempat') is-invalid @enderror" name="tempat"
                                        placeholder="Tempat">
                                    @error('tempat')
                                        <div id="tempat" class="form-text"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="penerima_manfaat">Penerima Manfaat</label>
                                    <input id="penerima_manfaat" type="text"
                                        class="form-control @error('penerima_manfaat') is-invalid @enderror"
                                        name="penerima_manfaat" placeholder="Penerima Manfaat">
                                    @error('penerima_manfaat')
                                        <div id="penerima_manfaat" class="form-text"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="anggaran">Anggaran</label>
                                    <input id="anggaran" type="text"
                                        class="form-control @error('anggaran') is-invalid @enderror" name="anggaran"
                                        placeholder="Anggaran">
                                    @error('anggaran')
                                        <div id="anggaran" class="form-text"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pengeluaran">Pengeluaran</label>
                                    <input id="pengeluaran" type="text"
                                        class="form-control @error('pengeluaran') is-invalid @enderror" name="pengeluaran"
                                        placeholder="Pengeluaran">
                                    @error('pengeluaran')
                                        <div id="pengeluaran" class="form-text"></div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="sisa">Sisa</label>
                                    <input id="sisa" type="text"
                                        class="form-control @error('sisa') is-invalid @enderror" name="sisa"
                                        placeholder="Sisa">
                                    @error('sisa')
                                        <div id="sisa" class="form-text"></div>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="file" class="form-label">file</label>
                                    <input type="file" class="form-control" id="file" name="file">
                                    @error('file')
                                        <div id="file" class="form-file"></div>
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
