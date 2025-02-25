<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    public function index(){
        $students = student::all();
        return view('student.index', compact('students'));

    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:students,email',
            'dob' => 'required|date',
            'Major' => 'required|string',
            'gender' => 'required|in:male,female',
        ]);
        $newstudent = student::create($data);

        return redirect()->route('student.index')->with('success', 'New student created successfully!');
    }

    public function edit(student $student){
        return view('student.edit', ['student' => $student]);
    }

    public function update(student $student, Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'dob' => 'required|date',
            'Major' => 'required|string',
            'gender' => 'required|in:male,female',
        ]);

        $student->update($data);

        return redirect(route('student.index'))->with('success', 'Student Profile Updated Succesffully');
    }

    public function destroy(student $student){
        $student->delete();
        return redirect(route('student.index'))->with('success', 'Info Student deleted Succesffully');
    }
}
