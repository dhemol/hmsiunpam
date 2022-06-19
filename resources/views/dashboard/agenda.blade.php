@extends('dashboardlayouts.main')
@section('title', 'Kalender Himpunan | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Calendar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Calendar</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Calendar</h2>
            <p class="section-lead">
                Here's a list of the events in the system.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Calendar</h4>
                        </div>
                        <div class="card-body">
                            <div class="fc-overflow">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
