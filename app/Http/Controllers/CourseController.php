<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = course::all();
        return view('course.index', compact('courses'));

    }

    public function create(){
        return view('course.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|unique:courses,course_code',
            'credit_hour' => 'required|integer',
            'description'  => 'nullable|string',
        ]);

        $newcourse = course::create($data);

        return redirect(route('course.index'))->with('success', 'Course added Succesffully');

    }

    public function edit(course $course){
        return view('course.edit', ['course' => $course]);
    }

    public function update(Request $request, Course $course)
{
     $data = $request->validate([
        'course_name'  => 'required|string|max:255',
        'course_code'  => 'required|string|unique:courses,course_code,' . $course->id,
        'credit_hour'  => 'required|integer',
        'description'  => 'nullable|string|',
    ]);

      $course->update($data);

     return redirect()->route('course.index')->with('success', 'Course updated successfully!');
}

    public function destroy(course $course){
        $course->delete();
        return redirect(route('course.index'))->with('success', 'Info Course deleted Succesffully');
    }

    public function show(Course $course)
    {
        $course->load('students'); // Eager load students relationship
        return view('course.index', compact('course'));
    }
}




