@extends('layouts.main')
@section('title', 'Blog | HMSI UNPAM')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">HOME<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ url('/post') }}">BLOG<i class="ti-arrow-right"></i></a>
                            </li>
                            <li class="active"><a href="{{ url('/category') }}">CATEGORIES</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ $title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <!-- Start Single Blog  -->
                    @foreach ($categories as $category)
                        <div class="shop-single-blog">
                            <a href="/post?category={{ $category->slug }}">
                                <img src="https://source.unsplash.com/400x400?{{ $category->name }}"
                                    alt="{{ $category->name }}">
                                <div class="card-img-overlay position-absolute d-flex align-items-center text-white p-0">
                                    <h4 class="card-title text-center flex-fil p-4 f-s-3"
                                        style="background-color: rgba(0,0,0,0.7) ">
                                        {{ $category->name }}</h4>
                                </div>
                            </a>
                        </div>
                        <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
