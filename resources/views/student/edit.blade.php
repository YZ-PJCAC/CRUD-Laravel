<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap1.css') }}">
    <title>Update Student Information</title>
</head>
<body>
    <h1>Update Student Profile</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>


    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Update Student Information</h3>
                        <p>Fill in the data below.</p>
                        <form method="POST" action="{{ route('student.update', ['student' => $student->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name', $student->name) }}" required />
                            </div>

                            <div class="col-md-12">
                                <label>Phone Number:</label>
                                <input class="form-control" type="number" name="phone" placeholder="only in numbers" value="{{ old('phone', $student->phone) }}" required />
                            </div>

                            <div class="col-md-12">
                                <label>Email:</label>
                                <input class="form-control"  type="email" name="email" placeholder="Email" value="{{ old('email', $student->email) }}" required />
                            </div>


                           <div class="col-md-12">
                            <label>Date of Birth:</label>
                            <input class="form-control" type="date" name="dob" value="{{ old('dob', $student->dob) }}" required />
                           </div>

                           <div class="col-md-12">
                            <label>Major:</label>
                            <input class="form-control" type="text" name="Major" value="{{ old('Major', $student->Major) }}" required />
                        </div>

                        <div>
                            <label>Gender</label>
                            <select name="gender" required>
                                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div>
                            <input type="submit" value="Update" class="btn btn-primary" />
                            <button type="button" onclick="window.location.href='{{ route('student.index') }}'" class="btn btn-primary">Cancel</button>
                        </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
