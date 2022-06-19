@extends('dashboardlayouts.main')
@section('title', 'Detail Anggota | HMSI UNPAM')
@section('content')
    <section class="section">
        <section class="section">
            <div class="section-header">
                <h1>Edit Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title"></h2>
                <p class="section-lead">
                    Change information about yourself on this page.
                </p>
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ $member->save() }}" novalidate="">
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" value="{{ $member->nik }}"
                                                disabled="active">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{ $member->nama }}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the fullname
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Username</label>
                                            <input type="text" class="form-control" value="{{ $member->username }}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the Username
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Password</label>
                                            <input type="password" class="form-control"
                                                value="bcrypt{{ $member->password }}" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the password
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ $member->email }}"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Phone</label>
                                            <input type="tel" class="form-control" value="{{ $member->no_hp }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Address</label>
                                            <textarea class="form-control summernote-simple">{{ $member->alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
