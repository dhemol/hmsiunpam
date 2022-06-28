@extends('dashboardlayouts.main')
@section('title', 'Detail Admin | HMSI UNPAM')
@section('content')
    <section class="section">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url('/dashboard/admin') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Detail Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Detail Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title"></h2>
                <p class="section-lead">
                    This is information about yourself on this page.
                </p>
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt=" image" src="{{ asset('storage/' . $admin->image) }}"
                                    class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-name">
                                            <h2>{{ $admin->name }}</h2>
                                            <div class="text-muted d-inline font-weight-normal">
                                                <div>{{ $admin->field->name }}</div>
                                            </div>
                                            {{ $admin->department->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-justify">
                            <div class="font-weight-bold mb-2">NBA</div>
                            <div class="font-weight mb-2">{{ $admin->nba }}</div>
                            <div class="font-weight-bold mb-2">Name</div>
                            <div class="font-weight mb-2">{{ $admin->name }}</div>
                            <div class="font-weight-bold mb-2">Username</div>
                            <div class="font-weight mb-2">{{ $admin->username }}</div>
                            <div class="font-weight-bold mb-2">Email</div>
                            <div class="font-weight mb-2">{{ $admin->email }}</div>
                            <div class="font-weight-bold mb-2">No.Hp</div>
                            <div class="font-weight mb-2">{{ $admin->no_hp }}</div>
                            <div class="font-weight-bold mb-2">Address</div>
                            <div class="font-weight mb-2">{{ $admin->address }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form action="/dashboard/admin/{{ $admin->username }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>NBA</label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="text"
                                                    class="form-control @error('nba') is-invalid @enderror" name="nba"
                                                    id="nba" value="{{ old('nba', $admin->nba) }}" disabled
                                                    readonly>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Name</label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    id="name" value="{{ old('name', $admin->name) }}" required
                                                    autofocus>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    id="email" value="{{ old('email', $admin->email) }}" required>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Username</label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    name="username" id="username"
                                                    value="{{ old('username', $admin->username) }}" required>
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Password</label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" id="password"
                                                    value="{{ old('password', $admin->password) }}" required>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>No.Hp</label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="number"
                                                    class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                                    id="no_hp" value="{{ old('no_hp', $admin->no_hp) }}" required>
                                                @error('no_hp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>
                                                Address
                                            </label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" id="address"
                                                    value="{{ old('address', $admin->address) }}" required>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Role</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="role" id="role"
                                                    class="form-select form-control-sm">
                                                    <option value="{{ $admin->role }}">
                                                        {{ old('role', $admin->role) == $admin->role ? ' selected' : ' ' }}
                                                        {{ $admin->role }}
                                                    </option>
                                                    <option value="Anggota"
                                                        {{ $admin->role == 'anggota' ? 'selected' : '' }}>
                                                        Anggota
                                                    </option>
                                                    <option value="Admin"
                                                        {{ $admin->role == 'admin' ? 'selected' : '' }}>
                                                        Admin
                                                    </option>
                                                    <option value="Superadmin"
                                                        {{ $admin->role == 'superadmin' ? 'selected' : '' }}>
                                                        Superadmin
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Status</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="status" id="status"
                                                    class="form-select form-control-sm">
                                                    <option value="{{ $admin->status }}">
                                                        {{ old('status', $admin->status) == $admin->status ? ' selected' : ' ' }}
                                                        {{ $admin->status }}
                                                    </option>
                                                    <option value="Aktif"
                                                        {{ $admin->status == 'aktif' ? 'selected' : '' }}>
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
                                        <div class="form-group col-md-12 col-12">
                                            <label>Position</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="position_id" id="position"
                                                    class="form-select form-control-sm">
                                                    @foreach ($positions as $position)
                                                        <option value="{{ $position->id }}">
                                                            {{ old('position_id', $admin->position_id) == $position->id ? ' selected' : ' ' }}
                                                            {{ $position->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Field</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="field_id" id="field"
                                                    class="form-select form-control-sm">
                                                    @foreach ($fields as $field)
                                                        <option value="{{ $field->id }}">
                                                            {{ old('field_id', $admin->field_id) == $field->id ? ' selected' : ' ' }}
                                                            {{ $field->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Department</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="department_id" id="department"
                                                    class="form-select form-control-sm">
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">
                                                            {{ old('department_id', $admin->department_id) == $department->id ? ' selected' : ' ' }}
                                                            {{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Image</label>
                                            <div class="col-sm-12 col-md-12">
                                                <label for="image" id="image"></label>
                                                <input type="hidden" name="old_image" value="{{ $admin->image }}"
                                                    id="old_image"
                                                    onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
                                                @if ($admin->image)
                                                    <img src="{{ asset('storage/' . $admin->image) }}"
                                                        alt="{{ $admin->name }} "
                                                        class="img-fluid mb-3 col-sm-5 d-block" id="img-preview">
                                                @else
                                                    <img class="img-fluid mb-3 col-sm-5" id="img-preview">
                                                @endif
                                                <input class="form-control @error('image') is-invalid @enderror"
                                                    type="file" id="image" name="image"
                                                    onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary" type="submit">Update Data
                                                    Admin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
