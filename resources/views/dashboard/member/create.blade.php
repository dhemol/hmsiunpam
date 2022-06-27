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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" id="username" value="{{ old('username') }}" required>
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="password" value="{{ old('password') }}" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No.Hp</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                            name="no_hp" id="no_hp" value="{{ old('no_hp') }}" required>
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Address
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" id="address" value="{{ old('address') }}" required>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Field</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="field_id" id="field" class="form-select">
                                            @foreach ($fields as $field)
                                                <option value="{{ $field->id }}">
                                                    {{ old('field_id') == $field->id ? ' selected' : ' ' }}
                                                    {{ $field->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Department</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="department_id" id="department" class="form-select">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ old('department_id') == $department->id ? ' selected' : ' ' }}
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img class="img-fluid mb-3 col-sm-5" id="img-preview">
                                        <label for="image" id="image"></label>
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image"
                                            onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
