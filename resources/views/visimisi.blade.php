@extends('layouts.main')
@section('title', 'Visi & Misi | HMSI UNPAM')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">HOME<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">Visi & Misi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="blog-title">{{ $abouts[0]->title }}</h2>
                                <div class="image">
                                    @if ($abouts[0]->image)
                                        <div style="overflow:hidden">
                                            <img src="{{ asset('storage/' . $abouts[0]->image) }}"
                                                alt="image"class="img-fluid">
                                        </div>
                                    @else
                                        <img src="https://source.unsplash.com/500x200?{{ $abouts[0]->image }}"
                                            alt="">
                                    @endif
                                </div>
                                <div class="blog-detail">
                                    <div class="content">
                                        <br>
                                        {!! $abouts[0]->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.sidebar')
    </section>
    <!-- /End Cowndown Area -->
@endsection
