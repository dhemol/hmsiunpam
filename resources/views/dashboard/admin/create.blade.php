@extends('dashboardlayouts.main')
@section('title', 'Tambah Data Admin | HMSI UNPAM')
@section('content')

    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/admin') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Data Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/admin') }}">Data Admin</a></div>
                <div class="breadcrumb-item">Create Data Admin</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Admin</h2>
            <p class="section-lead">
                On this page you can create a new Data Admin and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Your Data</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/dashboard/admin') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NBA</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('nba') is-invalid @enderror"
                                            name="nba" id="nba" value="{{ old('nba') }}" required autofocus>
                                        @error('nba')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="role" id="role" class="form-select form-control">
                                            <option value="{{ $admin->role }}" @selected(old('role') == $admin->role)
                                                @disabled(true)>
                                                -- Select Role --
                                            </option>
                                            <option value="Anggota" {{ $admin->role == 'anggota' ? 'selected' : '' }}>
                                                Anggota
                                            </option>
                                            <option value="Admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>
                                                Admin
                                            </option>
                                            <option value="Superadmin"
                                                {{ $admin->role == 'superadmin' ? 'selected' : '' }}>
                                                Superadmin
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" id="status" class="form-select form-control">
                                            <option value="{{ $admin->status }}" @selected(old('status') == $admin->status)
                                                @disabled(true)>
                                                -- Select Status --
                                            </option>
                                            <option value="Aktif" {{ $admin->status == 'aktif' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="Nonaktif"
                                                {{ $admin->status == 'nonaktif' ? 'selected' : '' }}>
                                                Nonaktif
                                            </option>
                                            <option value="Demisioner"
                                                {{ $admin->status == 'demisioner' ? 'selected' : '' }}>
                                                Demisioner
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Position</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="position_id" id="position" class="form-select form-control">
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}" @selected(old('position_id') == $position->id)>
                                                    {{ $position->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Field</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="field_id" id="field" class="form-select form-control">
                                            @foreach ($fields as $field)
                                                <option value="{{ $field->id }}" @selected(old('field_id') == $field->id)>
                                                    {{ $field->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Department</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="department_id" id="department" class="form-select form-control">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"@selected(old('department_id') == $department->id)>
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
                                        <button class="btn btn-primary" type="submit">Create Data Admin</button>
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
