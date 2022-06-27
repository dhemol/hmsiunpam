@extends('dashboardlayouts.main')
@section('title', 'Data Archive | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Archive</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/archive/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard.archive.index') }}">Archive</a></div>
                <div class="breadcrumb-item">All Archive</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Archive</h2>
            <p class="section-lead">
                You can manage all Archive, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Archive</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Titlle</th>
                                        <th>Type</th>
                                        <th>Nomor Surat</th>
                                        <th>File</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @foreach ($archives as $archive)
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="text-align: justify" width="230px">
                                                {{ $archive->title }}
                                            </td>
                                            <td>{{ $archive->type }}</td>
                                            <td>{{ $archive->nomor_surat }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $archive->file) }}" target="_blank"
                                                    class="btn btn-success">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                            <td>{{ $archive->created_at }}</td>
                                            <td>
                                                <a href="/dashboard/archive/{{ $archive->slug }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/dashboard/archive/{{ $archive->slug }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
