@extends('authlayouts.main')
@section('title', 'Register | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="{{ url('/img/hmsi.png') }}" alt="logo" width="150"
                            class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ url('/register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Name</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            autofocus required value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            required value="{{ old('username') }}">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="email" class="d-block">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            required value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password"
                                            class="form-control pwstrength @error('password') is-invalid @enderror"
                                            data-indicator="pwindicator" name="password" required>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Role</label>
                                        <select name="role" id="role" class="form-select form-control">
                                            <option value="{{ $member->role }}"@selected(old('role', $member->role == 'aktif') == $member->role)
                                                @disabled(true)>
                                                --Select Role--
                                            </option>
                                            <option value="Anggota" {{ $member->role == 'anggota' ? 'selected' : '' }}>
                                                Anggota
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-select form-control">
                                            <option value="{{ $member->status }}" @selected(old('status', $member->status == 'aktif') == $member->status)
                                                @disabled(true)>
                                                --Select Status--
                                            </option>
                                            <option value="Aktif" {{ $member->status == 'aktif' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Position</label>
                                        <select name="position_id" id="position" class="form-select form-control">
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}" @selected(old('position_id', $position->name == 'Anggota') == $position->id)>
                                                    @if ($position->name !== 'Anggota' ? 'disabled' : '')
                                                    @else
                                                        {{ $position->name }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Fields</label>
                                        <select name="field_id" id="field_id" class="form-select form-control">
                                            @foreach ($fields as $field)
                                                <option value="{{ $field->id }}" @selected(old('field_id', $field->name == '--') == $field->id)>
                                                    @if ($field->name !== '--' ? 'disabled' : '')
                                                    @else
                                                        {{ $field->name }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Department</label>
                                        <select name="department_id" id="department_id" class="form-select form-control">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" @selected(old('department_id', $department->name == '---') == $department->id)>
                                                    @if ($department->name !== '---' ? 'disabled' : '')
                                                    @else
                                                        {{ $department->name }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Country</label>
                                        <select class="form-control selectric">
                                            <option>Indonesia</option>
                                            <option>Palestine</option>
                                            <option>Syria</option>
                                            <option>Malaysia</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Province</label>
                                        <select class="form-control selectric">
                                            <option>West Java</option>
                                            <option>East Java</option>
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms
                                            and conditions</label>
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                                <div class="mt-4 mb-3 text-muted text-center">
                                    Already Registered? <a href="{{ url('/login') }}">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> Developed By <a
                            href="https://instagram.com/dhemol">Dede
                            Maulana</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
