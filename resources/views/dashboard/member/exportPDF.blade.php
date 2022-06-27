<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anggota HMSI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="card-body">
        <div class="clearfix mb-3"></div>
        <h4 style="justify-content-center">Anggota HMSI UNPAM</h4>
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Field</th>
                    <th>Department</th>
                    <th>Status</th>
                </tr>
                @foreach ($anggota as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td width="100px">{{ $member->id }}</td>
                        <td width="100px">{{ $member->name }}</td>
                        <td width="100px">{{ $member->field->name }}</td>
                        <td width="100px">{{ $member->department->name }}</td>
                        <td>
                            <div class="badge badge-primary">{{ $member->status }}</div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
