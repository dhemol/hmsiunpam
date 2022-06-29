@extends('dashboardlayouts.main')
@section('title', 'Data Contact | HMSI UNPAM')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contact</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ url('/dashboard.contact.index') }}">Contact</a></div>
                <div class="breadcrumb-item">All Contact</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Contact</h2>
            <p class="section-lead">
                You can manage all Contact, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Contact</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>No.Hp</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @foreach ($contacts as $contact)
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="text-align: justify" width="200px">
                                                {{ $contact->name }}
                                            </td>
                                            <td style="text-align: justify" width="200px">
                                                {{ $contact->email }}
                                            </td>
                                            <td style="text-align: justify" width="200px">
                                                {{ $contact->no_hp }}
                                            </td>
                                            <td style="text-align: left" width="230px">
                                                {{ $contact->subject }}
                                            </td>
                                            <td style="text-align: justify" width="230px">
                                                {{ $contact->message }}
                                            </td>
                                            <td>
                                                <a href="/dashboard/contact/{{ $contact->id }}"
                                                    class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="View"><i class="fas fa-newspaper"></i></a>
                                                <form action="/dashboard/contact/{{ $contact->id }}" method="POST"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
