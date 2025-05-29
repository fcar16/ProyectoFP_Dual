<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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
   public function show($id)
{
    $student = Student::find($id);
    $cvUrl = $student && $student->CV ? asset('storage/' . $student->CV) : null;
    return response()->json([
        'student' => $student,
        'cv_url' => $cvUrl,
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, $id)
{



    $student = \App\Models\Student::findOrFail($id);

    $student->dni = $request->dni;
    $student->name = $request->name;
    $student->email = $request->email;
    $student->group = $request->group;
    $student->course = $request->course;
    $student->password = bcrypt($request->password);

    if ($request->hasFile('CV')) {
        if ($student->CV) {
            Storage::disk('public')->delete($student->CV);
        }
        $path = $request->file('CV')->store('cvs', 'public');
        $student->CV = $path;
    }

    $student->save();

    $cvUrl = $student->CV ? asset('storage/' . $student->CV) : null;

    return response()->json([
        'success' => true,
        'student' => $student,
        'cv_url' => $cvUrl,
    ]);
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
