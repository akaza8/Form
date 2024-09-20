<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">User Information Form</h2>
        <form action="{{ route('form.data') }}"  method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="dob">Birth Date</label>
                <input type="date" name="dob" id="dob" class="form-control">
            </div>
            <div class="form-group">
                <label>Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <div id="degree-container" class="form-group mt-4">
                <label for="">Degrees</label>
                <div class="degree-group">
                    @foreach (old('degrees', []) as $index => $degree)
                        <div class="form-row align-items-center">
                            <div class="col-sm-4 mb-1 mb-sm-0 mt-2">
                                <input type="text" class="form-control" name="degrees[]" placeholder="Degree" value="{{ $degree }}">
                                @error('degrees.' . $index)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4 mb-1 mb-sm-0 mt-2">
                                <input type="number" class="form-control" name="percentages[]" placeholder="Percentage" value="{{ old('percentages.' . $index) }}">
                                @error('percentages.' . $index)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-2 mt-1">
                                <button type="button" class="btn btn-danger btn-sm remove-degree">Delete</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-danger mt-3" id="add-degree">Add Degree</button>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script id="degree-template" type="text/template">
        <div class="form-row align-items-center">
            <div class="col-sm-4 mb-2 mb-sm-0">
                <input type="text" class="form-control" name="degrees[]" placeholder="Degree">
            </div>
            <div class="col-sm-4 mb-2 mb-sm-0">
                <input type="number" class="form-control" name="percentages[]" placeholder="Percentage">
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger btn-sm remove-degree">Delete</button>
            </div>
        </div>
    </script>

    <script>
        $(function() {
            $('#add-degree').click(function() {
                var template = $('#degree-template').html();
                $('#degree-container .degree-group').append(template);
            });

            $('#degree-container').on('click', '.remove-degree', function() {
                $(this).closest('.form-row').remove();
            });
        });
    </script>
</body>
</html>
