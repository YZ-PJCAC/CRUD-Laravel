<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap1.css') }}">

    <title>SMS System - Course</title>
</head>
<body>
    <h1>New Course Adding</h1>
    <div>
    @if ($errors->has('course_code'))
    <script>
        alert('{{ $errors->first('course_code') }}');
    </script>
    @endif
</div>

<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Add New Course</h3>
                    <p>Fill in the data below.</p>
                    <form action="{{ route('course.store') }}" method="POST">
                        @csrf <!-- CSRF token is required for security -->

                        <div class="col-md-12">
                            <label>Course Code:</label>
                            <input class="form-control" type="text" name="course_code" required placeholder="Eg.DSA2134">
                        </div>

                        <div class="col-md-12">
                            <label>Course Name:</label>
                            <input class="form-control" type="text" name="course_name" required placeholder="Eg.Software Engineer"><br>
                        </div>

                        <div class="col-md-12">
                            <label>Credit Hour:</label>
                            <input class="form-control" type="number" name="credit_hour" required placeholder="Eg.3, 4">
                        </div>


                       <div class="col-md-12">
                        <br><label>Description:</label>
                          <input class="form-control" type="text" name="description" placeholder="Eg.">
                       </div>

                        <div class="form-button mt-3">
                            <button type="submit" class="btn btn-primary">Save New Course</button>
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
