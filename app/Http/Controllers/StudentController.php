<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\StudentService;

class StudentController extends Controller
{

    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        return $this->studentService->indexFromRequest();
    }

    public function viewinfo($id, Request $request)
    {
        return $this->studentService->viewFromRequest($request, $id);
    }

    public function create()
    {
        return $this->studentService->addFromRequest();
    }

    public function store(Request $request)
    {
       $student = new Student();
       return $this->studentService->storeFromRequest($request, $student);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        return $this->studentService->updateFromRequest($request, $student);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        return $this->studentService->destroyFromRequest($id);
    }


}
