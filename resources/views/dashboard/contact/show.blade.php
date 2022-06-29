@extends('dashboardlayouts.main')
@section('title', 'Detail Contact | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/dashboard/contact') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Contacts</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard/contact') }}">Contact</a></div>
                <div class="breadcrumb-item">Contacts</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Messages From Viewers</h2>
            <p class="section-lead">
                Some viewers need an information.
            </p>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Contacts</h4>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none"
                                data-toggle-slide="#ticket-items">
                                <i class="fas fa-list"></i> All Contacts
                            </a>
                            <div class="tickets">
                                <div class="ticket-items" id="ticket-items">
                                    <div class="ticket-item active">
                                        <div class="ticket-title">
                                            <h4>{{ $contact->name }}</h4>
                                        </div>
                                        <div class="ticket-desc">
                                            <div>{{ $contact->email }}</div>
                                            <div class="bullet"></div>
                                            <div>{{ $contact->no_hp }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-content">
                                    <div class="ticket-header">
                                        <div class="ticket-detail">
                                            <div class="ticket-title">
                                                <h4>{{ $contact->subject }}</h4>
                                            </div>
                                            <div class="ticket-info">
                                                <div class="font-weight-600">{{ $contact->name }}</div>
                                                <div class="bullet"></div>
                                                <div class="text-primary font-weight-600">
                                                    {{ $contact->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-description">
                                        {!! $contact->message !!}

                                        <div class="ticket-divider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
