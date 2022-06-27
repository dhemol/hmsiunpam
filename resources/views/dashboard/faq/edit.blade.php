@extends('dashboardlayouts.main')
@section('title', 'Edit Data FAQ | HMSI UNPAM')
@section('content')

    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/faq') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Data FAQ</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/faq') }}">Data FAQ</a></div>
                <div class="breadcrumb-item">Edit Data FAQ</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Data FAQ</h2>
            <p class="section-lead">
                On this page you can edit a Data FAQ and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Your FAQ's Data</h4>
                        </div>
                        <div class="card-body">
                            <form action="/dashboard/faq/{{ $faq->slug }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Question</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('question') is-invalid @enderror"
                                            name="question" id="question" value="{{ old('question', $faq->question) }}"
                                            required autofocus>
                                        @error('question')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            name="slug" id="slug" value="{{ old('slug', $faq->slug) }}" required>
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Answer</label>
                                    <div class="col-sm-12 col-md-7">
                                        @error('answer')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <input id="answer" type="hidden" name="answer"
                                            value="{{ old('answer', $faq->answer) }}">
                                        <trix-editor input="answer"></trix-editor>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Update Data FAQ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const question = document.querySelector("#question");
        const slug = document.querySelector("#slug");

        question.addEventListener("keyup", function() {
            let preslug = question.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
