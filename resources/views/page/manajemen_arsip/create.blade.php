@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">

            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Arsip</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.store.arsip') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Nama">
                                    @error('nama')
                                        <div id="nama" class="form-text"></div>
                                    @enderror
                                </div> --}}


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
                                <div class="form-group">
                                    <label for="jenisArsip_id">Jenis Arsip</label>
                                    <select id="jenisArsip_id"
                                        class="form-control @error('jenisArsip_id') is-invalid @enderror"
                                        name="jenisArsip_id">
                                        <option value="" selected disabled>Pilih Jenis Arsip</option>
                                        @foreach ($jenisArsip as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenisArsip_id')
                                        <div id="jenisArsip_id" class="form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="jenis_arsip">Jenis Arsip</label>
                                    <input id="jenis_arsip" type="text"
                                        class="form-control @error('jenis_arsip') is-invalid @enderror" name="jenis_arsip"
                                        placeholder="Jenis Arsip">
                                    @error('jenis_arsip')
                                        <div id="jenis_arsip" class="form-text"></div>
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
                                        Tambah Arsip
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
