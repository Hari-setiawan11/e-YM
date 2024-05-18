@extends('administrator.layouts.app')


@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">



            <div class="row pt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Program</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('index.store.program') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Nama Program">
                                    @error('nama')
                                        <div id="nama" class="form-text"></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input id="deskripsi" type="text"
                                        class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                        placeholder="Deskripsi">
                                    @error('deskripsi')
                                        <div id="deskripsi" class="form-text"></div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="file">File</label>
                                    <div class="custom-file">
                                        <input type="file" id="file">
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                    @error('file')
                                        <div id="file" class="form-text"></div>
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
