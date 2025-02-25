<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Information</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex ">
    <div class="d-flex">
      <!-- Sidebar -->
      <div>
        @include('sidebar')
      </div>

      <!-- Vertical Divider -->
      <div class="vr mx-3"></div>

      <!-- Main Content -->
      <div class="flex-fill">
        <h1>Course Information</h1>
        @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
        @endif

        <div class="mb-3">
          <a href="{{ route('course.create') }}" class="btn btn-primary">Add New course</a>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Course Code</th>
              <th>Course Name</th>
              <th>Credit Hour</th>
              <th>Description</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($courses as $index => $course)
              <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $course->course_code }}</td>
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->credit_hour }}</td>
                <td>{{ $course->description }}</td>

                <td>
                  <a href="{{ route('course.edit', ['course' => $course]) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                  <form method="post" action="{{ route('course.destroy', ['course' => $course]) }}">
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
