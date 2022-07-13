@extends('dashboardlayouts.main')
@section('title', 'Administrator | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pengurus</h4>
                        </div>
                        <div class="card-body">
                            {{ $pengurus->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Anggota</h4>
                        </div>
                        <div class="card-body">
                            {{ $anggota->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Arsip</h4>
                        </div>
                        <div class="card-body">
                            {{ $archives->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Konten</h4>
                        </div>
                        <div class="card-body">
                            {{ $post->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>BPH HMSI UNPAM</h4>
                    </div>
                    <div class="card-body">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($pengurus as $key => $bph)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img class="d-block w-100" src="{{ asset('storage/' . $bph->image) }}"
                                            alt="{{ $bph->name }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $bph->name }}</h5>
                                            <p>{{ $bph->position->name }} HMSI UNPAM</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>All Blogs</h4>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Excerpt</th>
                                    <th>Created At</th>
                                </tr>
                                <tr>
                                    @foreach ($posts as $post)
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-align: left" width="210px">
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            {{ $post->author->name }}
                                        </td>
                                        <td style="text-align: justify" width="300px">{{ $post->excerpt }}</td>
                                        <td> {{ $post->created_at->format('d M Y') }}
                                        </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    {{ $posts->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
