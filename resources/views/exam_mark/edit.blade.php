<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap1.css') }}">
    <title>Update Mark</title>
</head>
<body>
    <h1>Update Mark</h1>
    <div>
        @if ($errors->any())
        <script>
            var errorMessages = "";
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach
            alert(errorMessages);
        </script>
        @endif

    </div>

    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Update Mark</h3>
                        <p>Fill in the data below.</p>
                        <form method="POST" action="{{ route('examination.update', ['examination' => $examination->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label>Student No.:</label>
                                <input class="form-control" type="text" name="student_code" value="{{ old('student_code', $examination->student_code) }}" disabled>
                            </div>

                            <div class="col-md-12">
                                <label>Course Code:</label>
                                <input class="form-control" type="text" name="course_code" value="{{ old('course_code', $examination->course_code) }}" disabled><br>
                            </div>

                            <div class="col-md-12">
                                <label>Mark:</label>
                                <input type="number" name="mark_obtain" value="{{ old('mark_obtain', $examination->mark_obtain) }}" required><br><br>
                            </div>
                        <div>
                            <input type="submit" value="Update" class="btn btn-primary"/>
                            <button type="button" onclick="window.location.href='{{ route('examination.index') }}'" class="btn btn-primary">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
