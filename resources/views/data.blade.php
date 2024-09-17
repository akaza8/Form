<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">User Information</h2>
        <div class="{{ empty($name) ? 'hidden' : '' }}">
            <p>Name: {{ $name }}</p>
        </div>
        <div class="{{ empty($email) ? 'hidden' : '' }}">
            <p>Email: {{ $email }}</p>
        </div>
        <div class="{{ empty($dob) ? 'hidden' : '' }}">
            <p>Birth Date: {{ $dob }}</p>
        </div>
        <div class="{{ empty($gender) ? 'hidden' : '' }}">
            <p>Gender: {{ $gender }}</p>
        </div>

        @if(!empty($degrees) && !empty($percentages))
            <h3 class="mt-4">Degrees</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Degree</th>
                    <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($degrees as $index=>$degree)
                        <tr>
                            <td>{{$degree ?? 'No Entry Added'}}</td>
                            <td>{{$percentages[$index] ?? 'N/A'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

        <a href="{{route('form.show')}}" class="btn btn-success">Rerdirect</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
