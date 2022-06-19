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
                            <li class="active"><a href="{{ url('/post') }}">BLOG</a>
                            </li>
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

            @if ($posts->count() > 0)
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Single Blog  -->
                        <div class="shop-single-blog">
                            <div class="position-absolute px-3 py-2 text-white"
                                style="background-color: rgba(0, 0, 0, 0.7)"><a
                                    href="/post?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
                                    {{ $posts[0]->category->name }}</a>
                            </div>
                            <a href="/post/{{ $posts[0]->slug }}">
                                <img src="https://source.unsplash.com/1200x400? {{ $posts[0]->category->name }}"
                                    alt="#">
                                <div class="content">
                                    <p class="date">{{ $posts[0]->created_at->diffForHumans() }}</p>
                                    <p class="date"> By: <a
                                            href="/post?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>
                                        <br>
                                        <a href="/post/{{ $posts[0]->slug }}"
                                            class="title">{{ $posts[0]->title }}</a>
                                    <p>{{ $posts[0]->excerpt }}</p>
                                    <a href="/post/{{ $posts[0]->slug }}" class="more-btn">Continue Reading...</a>
                                </div>
                        </div>
                        <!-- End Single Blog  -->
                    </div>
                </div>

                <!-- Start Single Blog  -->

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog  -->
                        @foreach ($posts->skip(1) as $post)
                            <div class="shop-single-blog">
                                <div class="position-absolute px-3 py-2 text-white"
                                    style="background-color: rgba(0, 0, 0, 0.7)">
                                    <a href="/post?category={{ $post->category->slug }}" class="text-decoration-none">
                                        {{ $post->category->name }}</a>
                                </div>
                                <a href="/post/{{ $post->slug }}">
                                    <img src="https://source.unsplash.com/400x400?{{ $post->category->name }}"
                                        alt="#">
                                    <div class="content">
                                        <p class="date">{{ $post->published_at }}</p>
                                        <p class="date"> By: <a
                                                href="/post?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                            <br>
                                            <a href="/post/{{ $post->slug }}" class="title">{{ $post->title }}</a>
                                        <p>{{ $post->excerpt }}</p>
                                        <a href="/post/{{ $post->slug }}" class="more-btn">Continue Reading...</a>
                                    </div>
                            </div>
                            <!-- End Single Blog  -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog  -->
            @endforeach
            <!-- End Single Blog  -->
        </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <strong>Maaf!</strong> Data tidak ditemukan.
                </div>
            </div>
        </div>
        @endif

        <div class="pagination">
            <div class="pagination pagination-list">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
