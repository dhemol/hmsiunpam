<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin HMSI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="card-body">
        <div class="clearfix mb-3"></div>
        <h4 style="justify-content-center">Admin HMSI UNPAM</h4>
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>No</th>
                    <th>NBA</th>
                    <th>Name</th>
                    <th>Field</th>
                    <th>Department</th>
                    <th>Status</th>
                </tr>
                @foreach ($admin as $admin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td width="100px">{{ $admin->nba }}</td>
                        <td width="100px">{{ $admin->name }}</td>
                        <td width="100px">{{ $admin->field->name }}</td>
                        <td width="100px">{{ $admin->department->name }}</td>
                        <td>
                            <div class="badge badge-primary">{{ $admin->status }}</div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
