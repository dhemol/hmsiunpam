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
                                    <div class="button-head">
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="/post_detail/{{ $bph->username }}">VIEW MORE</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h5>{{ $bph->name }}</h5>
                                    <div class="product-price">
                                        <p>{{ $bph->position->name }} HMSI UNPAM</p>
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
@endsection
