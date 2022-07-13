@extends('dashboardlayouts.main')
@section('title', 'Kalender Himpunan | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Agenda</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/event/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Agenda</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Agenda</h2>
            <p class="section-lead">
                Here's a list of the agendas in the system.
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
                            <h4>Agenda HMSI UNPAM</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ url('dashboard/eventPDF') }}">Print
                                            PDF<span class="badge badge-white"><i class="fas fa-print"></i></span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="float-right">
                                <form name="search" method="get" action="/dashboard/event">
                                    <div class="input-group">
                                        <input class="form-control" name="search" placeholder="Search Here....."
                                            type="search" value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" value="search" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @foreach ($events as $event)
                                            <td>{{ $loop->iteration }}</td>
                                            <td width="250px">
                                                {{ $event->title }}
                                                <div class="table-links">
                                                    in <a
                                                        href="/event/{{ $event->slug }}">{{ $event->category->name }}</a>
                                                    <div class="bullet"></div>
                                                    <a
                                                        href="/dashboard/event/{{ $event->slug }}">Rp{{ $event->cost }}</a>
                                                </div>
                                            </td>
                                            <td width="250px">{{ $event->location }} </td>
                                            <td>{{ $event->start }} </td>
                                            <td>
                                                {{ $event->end }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $event->image) }}" width="100"
                                                    height="100" alt="{{ $event->title }}">
                                            </td>
                                            <td>
                                                <a href="/dashboard/event/{{ $event->slug }}"
                                                    class="btn btn-success btn-action mr-1" data-toggle="tooltip"
                                                    title="View"><i class="fas fa-user-alt"></i></a>
                                                <a href="/dashboard/event/{{ $event->slug }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/dashboard/event/{{ $event->slug }}" method="POST"
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
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{ $events->links() }}
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
