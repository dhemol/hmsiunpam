@extends('dashboardlayouts.main')
@section('title', 'Detail About | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/about') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>About's Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/about') }}">About</a></div>
                <div class="breadcrumb-item">About's Detail</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">About's Detail</h2>
            <p class="section-lead">
                Here's a detail of About's data.
            </p>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>About's Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="tickets">
                                <div class="ticket-content">
                                    <div class="ticket-header">
                                        <div class="ticket-sender-picture img-shadow">
                                            <img src="https://source.unsplash.com/400x400?{{ $about->title ?? 'None' }}"
                                                alt="image">
                                        </div>
                                        <div class="ticket-detail">
                                            <div class="ticket-title">
                                                <h4>{{ $about->title }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-description">
                                        @if ($about->image)
                                            <div style="max-height: 500px; overflow:hidden">
                                                <img src="{{ asset('storage/' . $about->image) }}"
                                                    alt="image"class="img-fluid">
                                            </div>
                                        @else
                                            <img src="https://source.unsplash.com/500x200?{{ $about->title ?? 'None' }}"
                                                alt="">
                                        @endif
                                        {!! $about->description !!}
                                        <div class="gallery">
                                            <div class="gallery-item" data-image="{{ $about->image }}"
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
