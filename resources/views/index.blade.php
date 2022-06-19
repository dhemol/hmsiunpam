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
                        @foreach ($posts as $post)
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="/post_detail/{{ $post->slug }}">
                                        <img class="default-img" src="{{ $post->images }}" alt="#">
                                        <img class="hover-img" src="{{ $post->images }}" alt="#">
                                        <span class="out-of-stock"></span>
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="/post_detail/{{ $post->slug }}">VIEW MORE</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="/post_detail/{{ $post->slug }}" class="title">{{ $post->excerpt }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
