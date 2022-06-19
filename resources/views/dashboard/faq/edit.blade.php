@extends('dashboardlayouts.main')
@section('title', 'Detail Frequently Asked Questions | HMSI UNPAM')
@section('content')
    <section class="section">
        <section class="section">
            <div class="section-header">
                <h1>Edit Frequently Asked Questions</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Frequently Asked Questions</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title"></h2>
                <p class="section-lead">
                    Change information about Frequently Asked Questions on this page.
                </p>
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="" novalidate="">
                                <div class="card-header">
                                    <h4>Edit Frequently Asked Questions</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Question</label>
                                            <textarea class="form-control summernote-simple" name="question" id="question" cols="30" rows="10"
                                                value="{{ $faq->question }}"></textarea>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Answer</label>
                                            <textarea class="form-control summernote-simple" name="answer" id="answer" cols="30" rows="10"
                                                value="{{ $faq->answer }}"></textarea>
                                        </div>

                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
