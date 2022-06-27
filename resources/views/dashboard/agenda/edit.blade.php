@extends('dashboardlayouts.main')
@section('title', 'Edit Data Event | HMSI UNPAM')
@section('content')

    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/event') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Update Data Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/event') }}">Data Event</a></div>
                <div class="breadcrumb-item">Update Data Event</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Update Data Event</h2>
            <p class="section-lead">
                On this page you can update Data Event and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Your Event's Data</h4>
                        </div>
                        <div class="card-body">
                            <form action="/dashboard/event/{{ $event->slug }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" id="title" value="{{ old('title', $event->title) }}"
                                            required autofocus>
                                        @error('title')
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
                                            name="slug" id="slug" value="{{ old('slug', $event->slug) }}"
                                            required>
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cost</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('cost') is-invalid @enderror"
                                            name="cost" id="cost" value="{{ old('cost', $event->cost) }}" required
                                            autofocus>
                                        @error('cost')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                                            name="location" id="location"
                                            value="{{ old('location', $event->location) }}" required autofocus>
                                        @error('location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" class="form-control @error('start') is-invalid @enderror"
                                            name="start" id="start" value="{{ old('start', $event->start) }}"
                                            required autofocus>
                                        @error('start')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" class="form-control @error('end') is-invalid @enderror"
                                            name="end" id="end" value="{{ old('end', $event->end) }}" required
                                            autofocus>
                                        @error('end')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="category_id" id="category" class="form-select form-control-sm">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $event->category_id) == $category->id ? ' selected' : ' ' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <label for="image" id="image">Choose File</label>
                                        <input type="hidden" name="old_image" value="{{ $event->image }}" id="old_image"
                                            onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
                                        @if ($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}"
                                                alt="{{ $event->title }} " class="img-fluid mb-3 col-sm-5 d-block"
                                                id="img-preview">
                                        @else
                                            <img class="img-fluid mb-3 col-sm-5" id="img-preview">
                                        @endif
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image"
                                            onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <input id="description" type="hidden" name="description"
                                            value="{{ old('description', $event->description) }}">
                                        <trix-editor input="description"></trix-editor>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Update Data Event</button>
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
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
