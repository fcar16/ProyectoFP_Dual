<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
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
    public function store(Request $request) :RedirectResponse
    {
        $student = Student::create($request->all());
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
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
    public function update(Request $request, Student $student) :RedirectResponse
    {
        $student->update($request->all());
        return redirect()->route('student.index');
    }
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student) : RedirectResponse
    {
        $student->delete();
        return redirect()->route('student.index');
    }
}
