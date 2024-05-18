@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Donasi</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input id="deskripsi" type="text"
                                        class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                        placeholder="Ucapan/Do'a">
                                    @error('deskripsi')
                                        <div id="deskripsi" class="form-text"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="file">Bukti Transfer</label>
                                    <div class="custom-file">
                                        <input type="file" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @error('file')
                                        <div id="file" class="form-text"></div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Kirim
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
