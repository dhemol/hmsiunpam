@extends('dashboardlayouts.main')
@section('title', 'Data Jabatan | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Positions</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/position/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard.position.index') }}">Positions</a></div>
                <div class="breadcrumb-item">All Positions</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Positions</h2>
            <p class="section-lead">
                You can manage all Positions, such as editing, deleting and more.
            </p>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mt-4">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Positions</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @foreach ($positions as $position)
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="text-align: left">
                                                {{ $position->name }}
                                            </td>
                                            <td>
                                                {{ $position->users->count('pivot.field_id') }}
                                            </td>
                                            <td>
                                                <a href="/dashboard/position/{{ $position->slug }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/dashboard/position/{{ $position->slug }}" method="POST"
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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>A Typography by Developer</h4>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p class="mb-0">You are THE CREATOR of your own destiny.</p>
                                <footer class="blockquote-footer">Dhemol <cite title="Source Title">&copy;
                                        <?= date('Y') ?></cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
