<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exam Mark</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <div class="d-flex">
            <!-- Sidebar -->
            <div>
              @include('sidebar')
            </div>

            <!-- Vertical Divider -->
            <div class="vr mx-3"></div>

            <!-- Main Content -->
            <div class="flex-fill">
              <h1>Exam Marks</h1>
              @if(session('success'))
              <script>
                  alert("{{ session('success') }}");
              </script>
              @endif

              <form method="GET" action="{{ route('examination.generateReport') }}">
                  <div class="d-flex w-100 ">
                      <div class="justify-content-start align-items-center">
                          <a href="{{ route('examination.create') }}" class="btn btn-primary">Add New Record</a>
                      </div>
                      <div class="d-flex" style="margin-left: 60%; border: none;">
                          <div class="mx-2" >
                              <label>
                                  <input type="radio" name="search_type" value="student"
                                      {{ request('search_type') == 'student' ? 'checked' : '' }} required>
                                  Student
                              </label>
                          </div>

                          <div class="mx-2">
                              <label>
                                  <input type="radio" name="search_type" value="course"
                                      {{ request('search_type') == 'course' ? 'checked' : '' }} required>
                                  Course
                              </label>
                          </div>

                          <div class="mx-2 align-self-end align-items-center">
                              <button type="submit" class="btn btn-primary">Generate Report</button><br><br>
                          </div>
                      </div>
                  </div>
              </form>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Student No</th>
                    <th>Course ID</th>
                    <th>Mark</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($examinations as $index => $exam)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $exam->student_code }}</td>
                      <td>{{ $exam->course_code }}</td>
                      <td>{{ $exam->mark_obtain }}</td>

                      <td>
                        <a href="{{ route('examination.edit', ['examination' => $exam]) }}" class="btn btn-warning">Edit</a>
                      </td>
                      <td>
                        <form method="post" action="{{ route('examination.destroy', ['examination' => $exam]) }}">
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
        </div> <!-- End container -->
    </div>

  <!-- Bootstrap JS Bundle (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
