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
                            <li class="active"><a href="">BLOG'S DETAIL</a>
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
                                <h2 class="blog-title">{{ $posts->title }}</h2>
                                <div class="image">
                                    @if ($posts->image)
                                        <div>
                                            <img src="{{ asset('storage/' . $posts->image) }}"
                                                alt="image"class="img-fluid">
                                        </div>
                                    @else
                                        <img src="https://source.unsplash.com/500x200?{{ $posts->category->name }}"
                                            alt="">
                                    @endif>
                                </div>
                                <div class="blog-detail">
                                    <div class="blog-meta">
                                        <span class="author"><a href="/posts?author={{ $posts->author->username }}"><i
                                                    class="fa fa-user"></i>{{ $posts->author->name }}</a><a
                                                href="#"><i class="fa fa-calendar"></i>{{ $posts->created_at }}</a>
                                    </div>
                                    <div class="content" style="text-align: justify">
                                        {!! $posts->body !!}
                                    </div>
                                </div>
                                <div class="share-social">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-tags">
                                                <h4>Tag</h4>
                                                <ul class="tag-inner">
                                                    <li><a
                                                            href="/post?category={{ $posts->category->slug }}">{{ $posts->category->name }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="comments">
                                    <h3 class="comment-title">Comments</h3>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <!-- Single Comment -->
                                    @foreach ($comments as $comment)
                                        <div class="card card-default mb-4">
                                            <div class="card-header">By <b>{{ $comment->name }}</b> on
                                                <i>{{ $comment->created_at->diffForHumans() }}</i>
                                            </div>
                                            <div class="card-body">{{ $comment->body }}</div>
                                            <div class="card-footer" align="right">
                                                <a href="/post/{{ $posts->slug }}/{{ $comment->id }}/reply">
                                                    <button class="btn btn-primary"><i class="fa fa-reply"></i></button>
                                                </a>
                                                <form action="/post/{{ $posts->slug }}/{{ $comment->id }}"
                                                    method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit" name="delete"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- End Single Comment -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="reply">
                                    <div class="reply-head">
                                        <h2 class="reply-title">Leave a Comment</h2>
                                        <!-- Comment Form -->
                                        <form method="POST" id="comment_form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Your Name<span>*</span></label>
                                                        <input type="text" name="name" id="name""
                                                            class="form-control @error('name') is-invalid @enderror"placeholder="Enter Name">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Your Message<span>*</span></label>
                                                        <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror"
                                                            placeholder="Enter Message"></textarea>
                                                        @error('body')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                                        <button type="submit" name="submit" id="submit"
                                                            class="btn">Post comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- End Comment Form -->
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
