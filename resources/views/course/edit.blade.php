<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap1.css') }}">
    <title>Update course Information</title>
</head>
<body>
    <h1>Update course Profile</h1>
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
                        <h3>Update course Information</h3>
                        <form method="POST" action="{{ route('course.update', ['course' => $course->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label>Course Code:</label>
                               <input class="form-control" type="text" name="course_code" value="{{ old('course_code', $course->course_code) }}" required>
                            </div>

                            <div class="col-md-12">
                                <label>Course Name:</label>
                                <input class="form-control" type="text" name="course_name" value="{{ old('course_name', $course->course_name) }}" required>
                            </div>

                            <div class="col-md-12">
                                <br><label>Credit Hour:</label>
                                <input class="form-control" type="number" name="credit_hour" value="{{ old('credit_hour', $course->credit_hour) }}" required>
                            </div>


                           <div class="col-md-12">
                            <br><label>Description:</label>
                              <input class="form-control" textarea name="description" >{{ old('description', $course->description) }}</textarea>
                              ">
                           </div>

                           <div class="form-button mt-3">
                                <button type="submit" class="btn btn-primary">Update Course</button>
                                <button type="button" onclick="window.location.href='{{ route('course.index') }}'" class="btn btn-primary">Cancel</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
