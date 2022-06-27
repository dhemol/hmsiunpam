@extends('dashboardlayouts.main')
@section('title', 'Detail Blog | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/post') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Blog's Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/post') }}">Blogs</a></div>
                <div class="breadcrumb-item">Blog's Detail</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Blog's Detail</h2>
            <p class="section-lead">
                Here's a detail of blog's data.
            </p>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Blog's Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="tickets">
                                <div class="ticket-content">
                                    <div class="ticket-header">
                                        <div class="ticket-sender-picture img-shadow">
                                            <img src="https://source.unsplash.com/400x400?{{ $post->author->name }}"
                                                alt="image">
                                        </div>
                                        <div class="ticket-detail">
                                            <div class="ticket-title">
                                                <h4>{{ $post->title }}</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div class="font-weight-600">{{ $post->author->name }}</div>
                                                <div class="bullet"></div>
                                                <div class="text-primary font-weight-600">{{ $post->category->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-description">
                                        @if ($post->image)
                                            <div style="max-height: 500px; overflow:hidden">
                                                <img src="{{ asset('storage/' . $post->image) }}"
                                                    alt="image"class="img-fluid">
                                            </div>
                                        @else
                                            <img src="https://source.unsplash.com/500x200?{{ $post->category->name }}"
                                                alt="">
                                        @endif
                                        {!! $post->body !!}
                                        <div class="gallery">
                                            <div class="gallery-item" data-image="{{ $post->image }}"
                                                data-title="Image 1">
                                            </div>
                                        </div>

                                        <div class="ticket-divider"></div>
                                    </div>
                                </div>
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
