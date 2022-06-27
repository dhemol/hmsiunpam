<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda HMSI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="card-body">
        <div class="clearfix mb-3"></div>
        <h4 style="justify-content-center">Agenda HMSI UNPAM</h4>
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Cost</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
                @foreach ($events as $event)
                    <tr>
                        <td style="justify-content-center">{{ $loop->iteration }}</td>
                        <td width="100px">{{ $event->title }}</td>
                        <td width="100px"style="justify-content-center">{{ $event->location }}</td>
                        <td width="100px"style="justify-content-center">{{ $event->cost }}</td>
                        <td width="100px"style="justify-content-center">{{ $event->start }}</td>
                        <td width="100px"style="justify-content-center">{{ $event->end }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
