@extends('dashboardlayouts.main')
@section('title', 'Tambah Data Archive | HMSI UNPAM')
@section('content')

    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/archive') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Data Archive</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/archive') }}">Data Archive</a></div>
                <div class="breadcrumb-item">Create Data Archive</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Archive</h2>
            <p class="section-lead">
                On this page you can create a new Data Archive and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Your Archive's Data</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/dashboard/archive') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" id="title" value="{{ old('title') }}" required autofocus>
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            name="slug" id="slug" value="{{ old('slug') }}" required>
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Surat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text"
                                            class="form-control @error('nomor_surat') is-invalid @enderror"
                                            name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}" required>
                                        @error('nomor_surat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="type" id="type" class="form-select form-control">
                                            <option value="{{ $archive->type }}">
                                                {{ old('type') == $archive->type ? ' selected' : ' ' }}
                                                {{ $archive->type }}
                                            </option>
                                            <option value="Surat Masuk"
                                                {{ $archive->type == 'Surat Masuk' ? 'selected' : '' }}>
                                                Surat Masuk
                                            </option>
                                            <option value="Surat Keluar"
                                                {{ $archive->type == 'Surat Keluar' ? 'selected' : '' }}>
                                                Surat Keluar
                                            </option>
                                            <option value="Surat Internal"
                                                {{ $archive->type == 'Surat Internal' ? 'selected' : '' }}>
                                                Surat Internal
                                            </option>
                                            <option value="Laporan" {{ $archive->type == 'Laporan' ? 'selected' : '' }}>
                                                Laporan
                                            </option>
                                            <option value="Lain-lain"
                                                {{ $archive->type == 'Lain-lain' ? 'selected' : '' }}>
                                                Lain-lain
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        File</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="form-control @error('file') is-invalid @enderror"
                                            name="file" id="file" value="{{ old('file') }}">
                                        @error('file')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Create Data Archive</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
