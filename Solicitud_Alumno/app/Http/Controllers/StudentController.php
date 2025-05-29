<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class StudentController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('student.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {



        $student = new Student();
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

        return redirect()->route('student.index')->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {

        return view('student.edit', compact('student'));
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
        // Elimina el CV anterior si existe
        if ($student->CV) {
            Storage::disk('public')->delete($student->CV);
        }
        $path = $request->file('CV')->store('cvs', 'public');
        $student->CV = $path;
    }

    $student->save();

    // Devuelve la ruta pública del CV si existe
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
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();
        return redirect()->route('student.index');
    }
}
