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
                                            <option value="{{ $data->id }}"
                                                {{ old('programs_id') == $data->id ? 'selected' : '' }}>{{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('programs_id')
                                        <div id="programs_id" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input id="tanggal" type="date"
                                        class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                        value="{{ old('tanggal') }}">
                                    @error('tanggal')
                                        <div id="tanggal" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input id="tempat" type="text"
                                        class="form-control @error('tempat') is-invalid @enderror" name="tempat"
                                        value="{{ old('tempat') }}" placeholder="Tempat">
                                    @error('tempat')
                                        <div id="tempat" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="penerima_manfaat">Penerima Manfaat</label>
                                    <input id="penerima_manfaat" type="text"
                                        class="form-control @error('penerima_manfaat') is-invalid @enderror"
                                        name="penerima_manfaat" value="{{ old('penerima_manfaat') }}"
                                        placeholder="Penerima Manfaat">
                                    @error('penerima_manfaat')
                                        <div id="penerima_manfaat" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="anggaran">Anggaran</label>
                                    <input id="anggaran_display" type="text"
                                        class="form-control @error('anggaran') is-invalid @enderror" name="anggaran_display"
                                        value="{{ old('anggaran_display') }}" placeholder="Anggaran">
                                    <input id="anggaran" type="hidden" name="anggaran" value="{{ old('anggaran') }}">
                                    @error('anggaran')
                                        <div id="anggaran_error" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pengeluaran">Pengeluaran</label>
                                    <input id="pengeluaran_display" type="text"
                                        class="form-control @error('pengeluaran') is-invalid @enderror"
                                        name="pengeluaran_display" value="{{ old('pengeluaran_display') }}"
                                        placeholder="Pengeluaran">
                                    <input id="pengeluaran" type="hidden" name="pengeluaran"
                                        value="{{ old('pengeluaran') }}">
                                    @error('pengeluaran')
                                        <div id="pengeluaran_error" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
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
                                <script>
                                    function formatRupiah(input) {
                                        let displayValue = input.value.replace(/\D/g, ''); // Hapus semua karakter non-digit
                                        let formattedValue = displayValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambahkan titik setiap 3 angka
                                        input.value = formattedValue;

                                        // Set nilai asli tanpa format ke hidden input yang sesuai
                                        let hiddenInputId = input.id.replace('_display', '');
                                        document.getElementById(hiddenInputId).value = displayValue;
                                    }

                                    document.getElementById('anggaran_display').addEventListener('input', function(e) {
                                        formatRupiah(e.target);
                                    });

                                    document.getElementById('pengeluaran_display').addEventListener('input', function(e) {
                                        formatRupiah(e.target);
                                    });

                                    document.querySelector('form').addEventListener('submit', function(e) {
                                        let anggaranDisplayValue = document.getElementById('anggaran_display').value;
                                        let pengeluaranDisplayValue = document.getElementById('pengeluaran_display').value;

                                        // Hapus titik sebelum submit
                                        document.getElementById('anggaran').value = anggaranDisplayValue.replace(/\./g, '');
                                        document.getElementById('pengeluaran').value = pengeluaranDisplayValue.replace(/\./g, '');
                                    });
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
