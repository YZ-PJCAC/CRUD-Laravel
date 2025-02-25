<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Information</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex">
    <div class="d-flex ">
      <!-- Sidebar -->
      <div>
        @include('sidebar')
      </div>

      <!-- Vertical Divider -->
      <div class="vr mx-3"></div>

      <!-- Main Content -->
      <div class="flex-fill">
        <h1>Student Information</h1>
        @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
        @endif

        <div class="mb-3">
          <a href="{{ route('student.create') }}" class="btn btn-primary">Add New Student</a>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Student No</th>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Dat of Birth</th>
              <th>Major</th>
              <th>Gender</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($students as $student)
              <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->student_code }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->major }}</td>
                <td>{{ ucfirst($student->gender) }}</td>
                <td>
                  <a href="{{ route('student.edit', ['student' => $student]) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                  <form method="post" action="{{ route('student.destroy', ['student' => $student]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger" />
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div> <!-- End Main Content -->
    </div> <!-- End d-flex -->
  </div> <!-- End container -->

  <!-- Bootstrap JS Bundle (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
