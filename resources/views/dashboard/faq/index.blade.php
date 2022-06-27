@extends('dashboardlayouts.main')
@section('title', 'Data FAQ | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>FAQ</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/faq/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard.faq.index') }}">FAQ</a></div>
                <div class="breadcrumb-item">All FAQ</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">FAQ</h2>
            <p class="section-lead">
                You can manage all FAQ, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All FAQ</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Questions</th>
                                        <th>Answers</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @foreach ($faqs as $faq)
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="text-align: justify" width="230px">
                                                {{ $faq->question }}
                                            </td>
                                            <td style="text-align: justify" width="500px">
                                                {{ $faq->answer }}
                                            </td>
                                            <td>
                                                <a href="/dashboard/faq/{{ $faq->slug }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/dashboard/faq/{{ $faq->slug }}" method="POST"
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
