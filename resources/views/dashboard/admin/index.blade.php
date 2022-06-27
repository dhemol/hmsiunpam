@extends('dashboardlayouts.main')
@section('title', 'Data Admin | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Admin</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/admin/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Admin</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Admin</h2>
            <p class="section-lead">
                You can manage all Admins, such as editing, deleting and more.
            </p>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ url('dashboard/adminPDF') }}">Print
                                            PDF<span class="badge badge-white"><i class="fas fa-print"></i></span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="float-right">
                                <form name="searchAdmin" method="get" action="/dashboard/admin">
                                    <div class="input-group">
                                        <input class="form-control" name="searchAdmin" placeholder="Search Here....."
                                            type="search" value="{{ request('searchAdmin') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" value="searchAdmin" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Field</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $admin->id }}</td>
                                            <td> <img src="{{ asset('storage/' . $admin->image) }}" alt="image"
                                                    width="100" height="100"></td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td width="230px">{{ $admin->field->name }}</td>
                                            <td width="230px">{{ $admin->department->name }}</td>
                                            <td>
                                                @if ($admin->status == 'demisioner')
                                                    <div class="badge badge-success">{{ $admin->status }}</div>
                                                @elseif ($admin->status == 'nonaktif')
                                                    <div class="badge badge-danger">{{ $admin->status }}</div>
                                                @else
                                                    <div class="badge badge-primary">{{ $admin->status }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/dashboard/admin/{{ $admin->username }}"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/dashboard/admin/{{ $admin->username }}" method="post"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-action"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{ $admins->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
