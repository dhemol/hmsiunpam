@extends('dashboardlayouts.main')
@section('title', 'About | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>About</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/about/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">About</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">About</h2>
            <p class="section-lead">
                Here's a list of the abouts in the system.
            </p>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>About HMSI UNPAM</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @foreach ($abouts as $about)
                                            <td>{{ $loop->iteration }}</td>
                                            <td width="250px">
                                                {{ $about->title }}
                                            </td>
                                            <td width="300px">{{ $about->description }} </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $about->image) }}" width="100"
                                                    height="150" alt="{{ $about->title }}">
                                            </td>
                                            <td>
                                                <a href="/dashboard/about/{{ $about->slug }}"
                                                    class="btn btn-success btn-action mr-1" data-toggle="tooltip"
                                                    title="View"><i class="fas fa-user-alt"></i></a>
                                                <a href="/dashboard/about/{{ $about->slug }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/dashboard/about/{{ $about->slug }}" method="POST"
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
