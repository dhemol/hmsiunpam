@extends('dashboardlayouts.main')
@section('title', 'Data Artikel | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Blogs</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard/post/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard.post.index') }}">Blogs</a></div>
                <div class="breadcrumb-item">All Blogs</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Blogs</h2>
            <p class="section-lead">
                You can manage all Blogs, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Blogs</h4>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Excerpt</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @foreach ($posts as $post)
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="text-align: left" width="210px">
                                                {{ $post->title }}
                                            </td>
                                            <td>
                                                {{ $post->author->name }}
                                            </td>
                                            <td>
                                                {{ $post->category->name }}
                                            </td>
                                            <td style="text-align: justify" width="300px">{{ $post->excerpt }}</td>
                                            <td> {{ $post->created_at->format('d M Y') }}
                                            </td>
                                            <td>
                                                <a href="/dashboard/post/{{ $post->slug }}"
                                                    class="btn btn-success btn-action mr-1" data-toggle="tooltip"
                                                    title="View"><i class="fas fa-user-alt"></i></a>
                                                <a href="/dashboard/post/{{ $post->slug }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="/dashboard/post/{{ $post->slug }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-action"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
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
        </div>
    </section>
@endsection
