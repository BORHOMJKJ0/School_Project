<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(StudentResource::collection(Student::all()));
    }

    public function show(Student $student)
    {
        return response()->json(StudentResource::make($student));
    }

    public function store(StudentRequest $request)
    {
        $student = Student::create($request->all());

        return response()->json(StudentResource::make($student), 200);
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'string|unique:students,name',
            'age' => 'numeric',
            'class' => 'string',
            'number' => 'numeric|unique:students,number',
            'avg' => 'numeric',
        ]);
        $student->update($request->all());

        return response()->json(StudentResource::make($student), 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(StudentResource::make($student), 200);
    }
}
