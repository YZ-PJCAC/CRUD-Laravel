<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap1.css') }}">
    <title>SMS System</title>
</head>
<body>
    <h1>New Student Adding</h1>
    <div>
    @if ($errors->has('email'))
    <script>
        alert('{{ $errors->first('email') }}');
    </script>
    @endif
</div>

<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Add New Student</h3>
                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf

                        <div class="col-md-12">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" required placeholder="Name" >
                        </div>

                        <div class="col-md-12">
                            <label>Phone Number:</label>
                            <input class="form-control" type="number" name="phone" required placeholder="only in numbers">
                        </div>

                        <div class="col-md-12">
                            <label>Email:</label>
                            <input class="form-control"  type="email" name="email" required placeholder="Email">
                        </div>


                       <div class="col-md-12">
                        <label>Date of Birth:</label>
                        <input class="form-control" type="date" name="dob" required placeholder="Date Of Birth">
                       </div>

                       <div class="col-md-12">
                        <label>Major:</label>
                        <input class="form-control" type="text" name="Major" required placeholder="Software Engineer">
                    </div>

                        <label>Gender:</label>
                        <select name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br><br>

                    <button type="submit" class="btn btn-primary">Save New Student</button>
                    <button type="button" onclick="window.location.href='{{ route('student.index') }}'" class="btn btn-primary">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
