@extends('dashboardlayouts.main')
@section('title', 'Data Artikel | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Posts</h1>
            <div class="section-header-button">
                <a href="{{ url('/dashboard.post.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard.post.index') }}">Posts</a></div>
                <div class="breadcrumb-item">All Posts</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <p class="section-lead">
                You can manage all posts, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                            </div>
                            <div class="float-right">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @foreach ($posts as $post)
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="text-align: left">
                                                {{ $post->title }}
                                            </td>
                                            <td>
                                                {{ $post->author->name }}
                                            </td>
                                            <td>
                                                {{ $post->category->name }}
                                            <td>
                                                {{ $post->created_at->format('d M Y') }}
                                            </td>
                                            <td>
                                                <a href="/dashboard/post/{{ $post->slug }}"
                                                    class="btn btn-success btn-action mr-1" data-toggle="tooltip"
                                                    title="View"><i class="fas fa-user-alt"></i></a>
                                                <a href="/dashboard/post/{{ $post->slug }}/edit"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="/dashboard/post/{{ $post->slug }}/destroy"
                                                    class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
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
