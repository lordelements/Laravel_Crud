<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    // public function index()
    // {
    //     return view('student.index');
    // }

    public function Studentindex()
    {
        $student = Student::all();
        return view('student.index', compact('student'));
    }

    public function viewinfo(Request $request, $id)
    {
        $student = Student::find($id);
        return view('student.viewStudent', compact('student'));
    }

    public function create()
    {
        return view('student.createStudent');
    }

    public function store(Request $request)
    {

        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');

        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }

        $student->save();
        return redirect('/index')->with('status', 'Student image updated successfully');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    // public function Studedit_func()
    // {

    //     return view('student.StudeditForm');
    // }


    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');

        if ($request->hasfile('profile_image')) {

            $destiantion = 'uploads/students/' . $student->profile_image;
            if (file::exists($destiantion)) {
                file::delete($destiantion);
            }

            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }

        $student->update();
        
        return redirect()->back()->with('status', 'Student image updated successfully');
    }


      // Delete Student function 
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('index')->with('status', 'Student deleted successfully.');
    }


}
