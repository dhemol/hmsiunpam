@extends('layouts.main')
@section('title', 'FAQ | HMSI UNPAM')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">HOME<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">FREQUENTLY ASKED QUESTIONS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        @foreach ($faqs as $faq)
                            <div class="single-widget recent-post">
                                <h3 class="title justify-content">{{ $faq->question }}</h3>
                                <!-- Single Post -->
                                <div class="blog-detail">
                                    <div class="content">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                                <!-- End Single Post -->
                            </div>
                        @endforeach
                        <!--/ End Single Widget -->
                    </div>
                </div>
                @include('layouts.sidebar')
    </section>
    <!-- /End Cowndown Area -->
    </div>
    </div>
    </div>
    </div>
    </section>
    <!--/ End Blog Single -->
@endsection
