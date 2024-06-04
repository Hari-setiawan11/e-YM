@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">

            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Barang</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.update.distribusibarang', $distribusiBarang->id) }}">
                                @method('put')
                                @csrf
                                <input type="hidden" name="distribusi_id" value="{{ $distribusiBarang->distribusi_id }}">

                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input id="nama_barang" type="text"
                                        class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang"
                                        placeholder="Nama Barang" value="{{ $distribusiBarang->nama_barang }}">
                                    @error('nama_barang')
                                        <div id="nama_barang" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input id="volume" type="text"
                                        class="form-control @error('volume') is-invalid @enderror" name="volume"
                                        placeholder="Volume" value="{{ $distribusiBarang->volume }}">
                                    @error('volume')
                                        <div id="volume" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <input id="satuan" type="text"
                                        class="form-control @error('satuan') is-invalid @enderror" name="satuan"
                                        placeholder="Satuan" value="{{ $distribusiBarang->satuan }}">
                                    @error('satuan')
                                        <div id="satuan" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga_satuan">Harga_satuan</label>
                                    <input id="harga_satuan" type="text"
                                        class="form-control @error('harga_satuan') is-invalid @enderror" name="harga_satuan"
                                        placeholder="Harga Satuan" value="{{ $distribusiBarang->harga_satuan }}">
                                    @error('harga_satuan')
                                        <div id="harga_satuan" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input id="jumlah" type="text"
                                        class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                        placeholder="Jumlah" value="{{ $distribusiBarang->jumlah }}">
                                    @error('jumlah')
                                        <div id="jumlah" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Simpan Data Barang
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
