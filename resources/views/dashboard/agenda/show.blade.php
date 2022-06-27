@extends('dashboardlayouts.main')
@section('title', 'Detail Event | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/event') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Event's Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/event') }}">Agenda</a></div>
                <div class="breadcrumb-item">Event's Detail</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Event's Detail</h2>
            <p class="section-lead">
                Here's a detail of Event's data.
            </p>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Event's Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="tickets">
                                <div class="ticket-content">
                                    <div class="ticket-header">
                                        <div class="ticket-sender-picture img-shadow">
                                            <img src="https://source.unsplash.com/400x400?{{ $event->category->name ?? 'None' }}"
                                                alt="image">
                                        </div>
                                        <div class="ticket-detail">
                                            <div class="ticket-title">
                                                <h4>{{ $event->title }}</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div class="font-weight-600">Rp.{{ $event->cost }}</div>
                                                <div class="bullet"></div>
                                                <div class="text-primary font-weight-600">
                                                    {{ $event->category->name ?? 'None' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-description">
                                        @if ($event->image)
                                            <div style="max-height: 500px; overflow:hidden">
                                                <img src="{{ asset('storage/' . $event->image) }}"
                                                    alt="image"class="img-fluid">
                                            </div>
                                        @else
                                            <img src="https://source.unsplash.com/500x200?{{ $event->category->name ?? 'None' }}"
                                                alt="">
                                        @endif
                                        {!! $event->description !!}
                                        <div class="gallery">
                                            <div class="gallery-item" data-image="{{ $event->image }}"
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
