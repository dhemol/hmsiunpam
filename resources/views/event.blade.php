@extends('layouts.main')
@section('title', 'Event | HMSI UNPAM')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">Event</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <section class="cown-down">
        <div class="section-inner ">
            <div class="container">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-lg-6 col-12 padding-right">
                            <div class="image">
                                <img src="{{ $event->image }}" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 padding-left">
                            <div class="content">
                                <div class="heading-block">
                                    <p class="small-title">
                                    <h1>Up Coming Event</h1>
                                    </p>
                                    <h3><a href="{{ $event->slug }}" class="title">{{ $event->title }}</a></h3>
                                    <p class="text">{{ $event->description }}</p>
                                    <h1 class="price">Rp{{ $event->cost }}</h1>
                                    <p class="small-title">Save The Date</p>
                                    <div class="coming-time">
                                        <div class="clearfix" data-countdown="{{ $event->event_date }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
