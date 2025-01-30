<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Company;
use Illuminate\Support\Facades\DB;


class RequestController
{

    public function create()
    {
        $students = Student::all();
        $companies = Company::all();
        return view('request.create', compact('students', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'company_id' => 'required|exists:companies,id',
            'question' => 'required|string|max:255',
        ]);

        $student = Student::find($request->student_id);
        $student->companies()->attach($request->company_id, ['question' => $request->question]);

        return redirect()->route('student.show', $student->id)->with('success', 'Solicitud creada exitosamente.');
    }

    public function show($id)
    {
        $relation = DB::table('company_student')
            ->where('id', $id)
            ->first();

        $student = Student::find($relation->student_id);
        $company = Company::find($relation->company_id);

        return view('request.show', compact('relation', 'student', 'company'));
    }
    
     public function studentRequests($studentId)
    {
        $student = Student::findOrFail($studentId);
        $requests = DB::table('company_student')
            ->where('student_id', $studentId)
            ->get();

        return view('request.student_requests', compact('student', 'requests'));
    }
}
