<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class StudentService
{
    /**
     * Generate a new podcast stats report.
     */
    public function indexFromRequest()
    {
        $student = Student::all();
        return view('student.index', compact('student'));
    }

    public function addFromRequest()
    {
       return view('student.createStudent');
    }

    public function viewFromRequest(Request $request, $id)
    {
        $student = Student::find($id);
        return view('student.viewStudent', compact('student'));
    }


    public function storeFromRequest(Request $request, Student $student)
    {
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
        return redirect('/index')->with('status', 'Student added successfully');

    }


    public function updateFromRequest(Request $request, Student $student)
    {
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');

        if ($request->hasfile('profile_image')) {

            $destination = 'uploads/students/' . $student->profile_image;
            if (file::exists($destination)) {
                file::delete($destination);
            }

            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }

        $student->update();
        
        return redirect()->back()->with('status', 'Student updated successfully');

    }

    public function destroyFromRequest($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('index')->with('status', 'Student deleted successfully.');
    }



}