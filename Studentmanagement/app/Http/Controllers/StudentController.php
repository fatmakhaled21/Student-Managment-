<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
  
    public function index():View
    {
        $students = Student::all();
      return view ('students.index')->with('students', $students);
    }

    
    public function create(): View
    {
        return view('students.create');
    }

   
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Student::create($input);
        return redirect('students')->with('flash_message', 'Student Addedd!');  
    }

    
    public function show($id): View
    {
        $students = Student::find($id);
        return view('students.show')->with('students', $students);
    }

    
    public function edit($id): View
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }

  
    public function update(Request $request, $id): RedirectResponse
    {
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('students')->with('flash_message', 'Student Updated!');  
    }

   
    public function destroy($id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Student deleted!');  
    }
}