@extends('layouts.main')
@section('content')
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>BPH HMSI UNPAM</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                        @foreach ($pengurus as $bph)
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="default-img" src="{{ asset('storage/' . $bph->image) }}"
                                            alt="{{ $bph->name }}">
                                        <img class="hover-img" src="{{ asset('storage/' . $bph->image) }}" alt="#">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5>{{ $bph->name }}</h5>
                                    <div class="product-price">
                                        <p>{{ $bph->position->name }}</p>
                                        <p> {{ $bph->field->name }}</p>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="cown-down">
        <div class="section-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Our Upcoming Event</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-lg-6 col-12 padding-right">
                            <div class="image">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 padding-left">
                            <div class="content">
                                <div class="heading-block">
                                    <p class="small-title">
                                    <h1>HMSI UNPAM PROUDLY PRESENT</h1>
                                    </p>
                                    <h3><a href="{{ $event->slug }}" class="title">{{ $event->title }}</a></h3>
                                    <p class="text">{!! $event->description !!}</p>
                                    <h1 class="price">Rp{{ $event->cost }}</h1>
                                    <p class="small-title">{{ $event->location }}</p>
                                    <div class="coming-time">
                                        <div class="clearfix" data-countdown="{{ $event->end }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Blogs</h2>
                    </div>
                </div>
            </div>
            <!-- Start Single Blog  -->
            @if ($posts->count() > 0)
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <!-- Start Single Blog  -->
                        @foreach ($posts as $post)
                            <div class="shop-single-blog">
                                <div class="position-absolute px-3 py-2 text-white"
                                    style="background-color: rgba(0, 0, 0, 0.7)">
                                    <a href="/post?category={{ $post->category->slug }}" class="text-decoration-none">
                                        {{ $post->category->name }}</a>
                                </div>
                                <a href="/post/{{ $post->slug }}">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            style="overflow:hidden; max-height: 500px; max-width: 300px;" alt="#">
                                    @else
                                        <img
                                            src="https://source.unsplash.com/400x400?{{ $post->category->name }}"alt="#">
                                    @endif
                                    <div class="content">
                                        <p class="date">{{ $post->published_at }}</p>
                                        <p class="date"> By: <a
                                                href="/post?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                            <br>
                                            <a href="/post/{{ $post->slug }}" class="title">{{ $post->title }}</a>
                                        <p>{{ $post->excerpt }}</p>
                                        <a href="/post/{{ $post->slug }}" class="more-btn">Continue
                                            Reading...</a>
                                    </div>
                            </div>
                            <!-- End Single Blog  -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <!-- Start Single Blog  -->
            @endforeach
            <!-- End Single Blog  -->
            <!-- End Single Blog  -->
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info">
                        <h4>No posts found</h4>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection
