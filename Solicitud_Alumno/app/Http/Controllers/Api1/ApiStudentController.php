<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\JsonResponse;

class ApiStudentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): JsonResponse
    {
        $student = new Student();
        $student->dni = $request->dni;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->group = $request->group;
        $student->course = $request->course;
        $student->password = bcrypt($request->password);

        if ($request->hasFile('CV')) {
            $path = $request->file('CV')->store('cvs', 'public');
            $student->CV = $path;
        }

        $student->save();

        return response()->json(['success' => 'Estudiante creado exitosamente.', 'student' => $student], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json($student, 200);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, int $id): JsonResponse
    {
        $student = Student::find($id);

        if ($student) {
            $student->dni = $request->dni;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->group = $request->group;
            $student->course = $request->course;

            if ($request->hasFile('CV')) {
                $path = $request->file('CV')->store('cvs', 'public');
                $student->CV = $path;
            }

            $student->save();

            return response()->json(['success' => 'Estudiante actualizado exitosamente.', 'student' => $student], 200);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $student = Student::find($id);
        if ($student) {
            $studentData = $student->toArray();
            $student->delete();
            return response()->json(['success' => 'Estudiante eliminado exitosamente.', 'student' => $studentData], 200);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

}
