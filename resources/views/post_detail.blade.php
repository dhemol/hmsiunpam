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
                                    <img src="https://source.unsplash.com/1200x600?{{ $posts->category->name }}">
                                </div>
                                <div class="blog-detail">
                                    <div class="blog-meta">
                                        <span class="author"><a href="/post?author={{ $posts->author->username }}"><i
                                                    class="fa fa-user"></i>{{ $posts->author->name }}</a><a
                                                href="#"><i
                                                    class="fa fa-calendar"></i>{{ $posts->published_at }}</a>
                                    </div>
                                    <div class="content">
                                        {!! $posts->body !!}
                                        <blockquote> <i class="fa fa-quote-left"></i>{{ $posts->excerpt }}</blockquote>
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
                                    <!-- Single Comment -->
                                    <div id="display_comment"></div>
                                    <!-- End Single Comment -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="reply">
                                    <div class="reply-head">
                                        <h2 class="reply-title">Leave a Comment</h2>
                                        <!-- Comment Form -->
                                        <form method="POST" id="comment_form">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Your Name<span>*</span></label>
                                                        <input type="text" name="comment_name" id="comment_name"
                                                            class="form-control" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Your Message<span>*</span></label>
                                                        <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <input type="hidden" name="comment_id" id="comment_id"
                                                            value="0" />
                                                        <button type="submit" name="submit" id="submit"
                                                            class="btn">Post comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <span id="comment_message"></span>
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
