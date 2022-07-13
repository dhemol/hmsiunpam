@extends('dashboardlayouts.main')
@section('title', 'Detail Admin | HMSI UNPAM')
@section('content')
    <section class="section">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url('/dashboard/profile') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Detail Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Detail Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title"></h2>
                <p class="section-lead">
                    This is information about yourself on this page.
                </p>
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt=" image" src="" class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-name">
                                            <h2>{{ $anggota->name }}</h2>
                                            <div class="text-muted d-inline font-weight-normal">
                                                <div>{{ $anggota->field->name }}</div>
                                            </div>
                                            {{ $anggota->department->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="list-unstyled list-unstyled-border mt-4">
                                    <div class="media">
                                        <div class="media-icon"><i class="far fa-circle"></i></div>
                                        <div class="media-body">
                                            <h6>{{ $anggota->nba }}</h6>
                                            <p>ID</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon"><i class="far fa-circle"></i></div>
                                        <div class="media-body">
                                            <h6>{{ $anggota->name }}</h6>
                                            <p>Name</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon"><i class="far fa-circle"></i></div>
                                        <div class="media-body">
                                            <h6>{{ $anggota->username }}</h6>
                                            <p>Username</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon"><i class="far fa-circle"></i></div>
                                        <div class="media-body">
                                            <h6>{{ $anggota->email }}</h6>
                                            <p>Email</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon"><i class="far fa-circle"></i></div>
                                        <div class="media-body">
                                            <h6>{{ $anggota->no_hp }}</h6>
                                            <p>Phone Number</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon"><i class="far fa-circle"></i></div>
                                        <div class="media-body">
                                            <h6>{{ $anggota->address }}</h6>
                                            <p>Address</p>
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
