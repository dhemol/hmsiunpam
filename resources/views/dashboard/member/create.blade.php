@extends('dashboardlayouts.main')
@section('title', 'Tambah Data Anggota | HMSI UNPAM')
@section('content')

    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/member') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Data Anggota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/member') }}">Data Anggota</a></div>
                <div class="breadcrumb-item">Create Data Anggota</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Anggota</h2>
            <p class="section-lead">
                On this page you can create a new Data Anggota and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Your Data</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/dashboard/member') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nik">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type=" email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No.Hp</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control" name="no_hp">
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="jabatan">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote-simple" name="alamat"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Images</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="foto" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Create Data Anggota</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
