@extends('dashboardlayouts.main')
@section('title', 'Data FAQ Himpunan | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>DATA Frequently Asked Questions</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/faq/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Frequently Asked Questions</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Frequently Asked Questions</h2>
            <p class="section-lead">
                You can manage all FAQs, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Questions</th>
                                        <th>Answers</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $faq->question }}</td>
                                            <td>{{ $faq->answer }}</td>
                                            <td>
                                                <a href="/dashboard/faq/{{ $faq->id }}"
                                                    class="btn btn-success btn-action mr-1" data-toggle="tooltip"
                                                    title="View"><i class="fas fa-user-alt"></i></a>
                                                <a href="/dashboard/faq/{{ $faq->id }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="/dashboard/faq/{{ $faq->id }}/destroy"
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
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
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
