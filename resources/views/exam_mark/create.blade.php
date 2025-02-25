<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap1.css') }}">
    <title>SMS System - Exam Mark</title>
</head>
<body>
    <h1>New Exam Mark</h1>
    <div>
        @if ($errors->any())
        <script>
            let errorMessages = "";
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach
            alert(errorMessages); // Show error messages in an alert box
        </script>
    @endif

</div>

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>New Exam Mark</h3>
                        <p>Fill in the data below.</p>
                        <form action="{{ route('examination.store') }}" method="POST">
                            @csrf

                            {{-- <div class="col-md-12">
                                <label>Student No.:</label>
                                <input class="form-control" type="text" name="student_code" required placeholder="Eg.STU0000">
                            </div> --}}

                            <label for="student_code">Select or Type Student Code:</label><br>
                            <input list="student_codes" name="student_code" id="student_code" class="form-control" required>

                            <datalist id="student_codes">
                                @foreach ($students as $student)
                                    <option value="{{ $student->student_code }}">{{ $student->name }}</option>
                                @endforeach
                            </datalist>



                            <br><label for="course_code">Select or Type Course Code:</label><br>
                            <input list="course_codes" name="course_code" id="course_code" class="form-control" required>

                            <datalist id="course_codes">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->course_code }}">{{ $course->course_name }}</option>
                                @endforeach
                            </datalist>


                            <div class="col-md-12">
                                <br><label>Mark:</label>
                                <input class="form-control"  type="number" name="mark_obtain" required placeholder="Eg.30, 40"><br><br>
                            </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Save New Record</button>
                            <button type="button" onclick="window.location.href='{{ route(name: 'examination.index') }}'" class="btn btn-primary">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("examForm").addEventListener("submit", function(e) {
            e.preventDefault(); // Prevent form submission

            let formData = new FormData(this);

            fetch("{{ route('examination.store') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        let errorMessages = [];
                        if (data.errors) {
                            for (let field in data.errors) {
                                errorMessages.push(data.errors[field].join("\n"));
                            }
                            alert("Error:\n" + errorMessages.join("\n"));
                        }
                        throw new Error("Validation failed");
                    });
                }
                return response.json();
            })
            .then(data => {
                alert("Success: " + data.message);
                location.reload();
            })
            .catch(error => console.error("Error:", error));
        });
        </script>

</body>
</html>
