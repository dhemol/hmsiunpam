@extends('dashboardlayouts.main')
@section('title', 'Tambah Data FAQ | HMSI UNPAM')
@section('content')

    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/member') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Data FAQ</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/faq') }}">Data Frequently Asked Questions</a>
                </div>
                <div class="breadcrumb-item">Create Data Frequently Asked Questions</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Data Frequently Asked Questions</h2>
            <p class="section-lead">
                On this page you can create a new Data Frequently Asked Questions and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Your Data</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/dashboard/faq') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Question</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="question" id="question" cols="100" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Answer</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="answer" id="answer" cols="100" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Create Data Frequently Asked
                                            Questions</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
