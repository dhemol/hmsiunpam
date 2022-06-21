@extends('dashboardlayouts.main')
@section('title', 'Data Anggota | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Anggota</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/member/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Anggota</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Anggota</h2>
            <p class="section-lead">
                You can manage all Members, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">All <span
                                                class="badge badge-white">5</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Pengurus<span
                                                class="badge badge-primary">1</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Anggota Aktif<span
                                                class="badge badge-primary">1</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Anggota Pasif<span
                                                class="badge badge-primary">0</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="float-right">
                                <form name="searchAnggota" method="get" action="/dashboard/member">
                                    <div class="input-group">
                                        <input class="form-control" name="searchAnggota" placeholder="Search Here....."
                                            type="search" value="{{ request('searchAnggota') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" value="searchAnggota" type="submit"><i
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
                                        <th>Role</th>
                                        <th>Images</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($anggota as $member)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $member->id }}</td>
                                            <td width="200px">{{ $member->role->name }}</td>
                                            <td><img src="{{ $member->images }}" alt="image" width="100"
                                                    height="100" data-toggle="title" title=""></td>
                                            <td>{{ $member->name }}</td>
                                            <td width="150px">{{ $member->email }}</td>
                                            <td>
                                                <div class="badge badge-primary">{{ $member->status->name }}</div>
                                            </td>
                                            <td>
                                                <a href="/dashboard/member/{{ $member->username }}"
                                                    class="btn btn-success btn-action mr-1" data-toggle="tooltip"
                                                    title="View"><i class="fas fa-user-alt"></i></a>
                                                <a href="/dashboard/member/{{ $member->username }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="/dashboard/member/{{ $member->username }}/destroy"
                                                    class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{ $anggota->links() }}
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
