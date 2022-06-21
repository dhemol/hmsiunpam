@extends('dashboardlayouts.main')
@section('title', 'Detail Anggota | HMSI UNPAM')
@section('content')
    <section class="section">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url('/dashboard/member') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt=" image" src="{{ $member->images }}"
                                    class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-name">
                                            <h2>{{ $member->name }}</h2>
                                            <div class="text-muted d-inline font-weight-normal">
                                                <div>
                                                    <h5>{{ $member->position }}</h5>
                                                </div>
                                                {{ $member->address }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-justify">
                                <div class="font-weight-bold mb-2">NIK</div>
                                <div class="font-weight mb-2">{{ $member->nik }}</div>
                                <div class="font-weight-bold mb-2">Name</div>
                                <div class="font-weight mb-2">{{ $member->name }}</div>
                                <div class="font-weight-bold mb-2">Username</div>
                                <div class="font-weight mb-2">{{ $member->username }}</div>
                                <div class="font-weight-bold mb-2">Email</div>
                                <div class="font-weight mb-2">{{ $member->email }}</div>
                                <div class="font-weight-bold mb-2">No.Hp</div>
                                <div class="font-weight mb-2">{{ $member->no_hp }}</div>
                                <div class="font-weight-bold mb-2">Address</div>
                                <div class="font-weight mb-2">{{ $member->address }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
