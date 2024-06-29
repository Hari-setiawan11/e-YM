@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Donasi</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('form.store.donasi') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input id="deskripsi" type="text"
                                        class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                        placeholder="Titipan Do'a">
                                    @error('deskripsi')
                                        <div id="deskripsi" class="form-text"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                    <input id="nominal" type="text"
                                        class="form-control @error('nominal') is-invalid @enderror" name="nominal"
                                        placeholder="Nominal">
                                    @error('nominal')
                                        <div id="nominal" class="form-text"></div>
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
                                        Tambah Donasi
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

