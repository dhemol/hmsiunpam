@extends('dashboardlayouts.main')
@section('title', 'Data Category | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard.category.index') }}">Categories</a></div>
                <div class="breadcrumb-item">All Categories</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Categories</h2>
            <p class="section-lead">
                You can manage all Categories, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                    </tr>
                                    <tr>
                                        @foreach ($categories as $category)
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $category->name }}
                                            </td>
                                            <td>
                                                {{ $category->slug }}
                                            </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>A Typography by Developer</h4>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p class="mb-0">You are THE CREATOR of your own destiny.</p>
                                <footer class="blockquote-footer">Dhemol <cite title="Source Title">&copy;
                                        <?= date('Y') ?></cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
