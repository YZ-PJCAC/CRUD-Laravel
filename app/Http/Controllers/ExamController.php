<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Models\examination;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;


class ExamController extends Controller
{
    public function index(){
        $examinations = examination::all();
        return view('exam_mark.index', compact('examinations'));
    }

    public function create(){
        // return view('exam_mark.create');
        $students = Student::all();
        $courses = Course::all();
        return view('exam_mark.create', compact('students','courses'));

    }

    public function generateReport(Request $request)
{
    $searchType = $request->input('search_type');
    $searchColumn = $searchType == 'student' ? 'student_code' : 'course_code';
    $fileName = now()->format('Ymd_His').'_'.$searchType.'_report.csv';

    $headers = [
        "Content-Type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
    ];

    $results = Examination::select($searchColumn)
        ->selectRaw('AVG(mark_obtain) as average_mark')
        ->groupBy($searchColumn)
        ->get();

    $callback = function () use ($results, $searchType, $searchColumn) {
        $handle = fopen('php://output', 'w');

        //hearder
        fputcsv($handle, [$searchType == 'student' ? 'Student Code' : 'Course Code', 'Average Mark']);

        //data row
        foreach ($results as $result) {
            fputcsv($handle, [
                $result->$searchColumn,
                round($result->average_mark, 2)
            ]);
        }

        fclose($handle);
    };

    return response()->stream($callback, 200, $headers);
}



    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'student_code' => 'required|string|max:255|exists:students,student_code',
            'course_code' => 'required|string|max:255|exists:courses,course_code',
            'mark_obtain' => 'required|integer',
        ]);

        $request->validate([
            'student_code' => 'required|string|exists:students,student_code',
            'course_code'  => 'required|string|exists:courses,course_code',
            'mark_obtain'  => 'required|integer|min:0|max:100',
        ]);

        // Check if the same student and course already exist in the examination table
        $exists = Examination::where('student_code', $request->student_code)
                            ->where('course_code', $request->course_code)
                            ->exists();

        if ($exists) {
            // Throw a validation error for duplicate entry
            throw ValidationException::withMessages([
                'duplicate' => 'This student already has an exam record for this course.',
            ]);
        }


        $newcourse = examination::create(attributes: $data);

        return redirect(route('examination.index'))->with('success', 'Course added Succesffully');

    }

    public function edit(examination $examination){
        // return view('exam_mark.edit', data: ['examination' => $examination]);
        $students = Student::all();
        $courses = Course::all();
        return view('exam_mark.edit', compact('examination', 'students', 'courses'));
    }

    public function update(Request $request, examination $examination)
    {
        $data = $request->validate([
            'student_code' => 'string|max:255|exists:students,student_code',
            'course_code' => 'string|max:255|exists:courses,course_code',
            'mark_obtain' => 'required|integer',
        ]);

        // // Check if another examination with the same student_code and course_code exists
        // $exists = examination::where('student_code', $examination['student_code'])
        //                      ->where('course_code', $examination['course_code'])
        //                      ->where('id', '!=', $examination->id) // Exclude current record
        //                      ->exists();

        // if ($exists) {
        //     return back()->withErrors(['error' => 'The student and course combination already exists!']);
        // }

        // Proceed with update
        $examination->update($data);

        return redirect()->route('examination.index')->with('success', 'Exam mark updated successfully!');
    }


    public function destroy(examination $examination){
        $examination->delete();
        return redirect(route('examination.index'))->with('success', 'Exam mark info deleted Succesffully');
    }

    public function show(examination $examination)
    {
        $examination->load('students'); // Eager load students relationship
        return view('exam_mark.index', compact('examination'));
    }
}




