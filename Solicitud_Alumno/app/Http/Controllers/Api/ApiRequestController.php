<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Student;

use App\Http\Resources\RequestResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ApiRequestController
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'company_id' => 'required|exists:companies,id',
            'question' => 'required|string|max:255',
        ]);

        $student = Student::find($request->student_id);
        $student->companies()->attach($request->company_id, ['question' => $request->question]);

        $relation = DB::table('company_student')
            ->where('student_id', $request->student_id)
            ->where('company_id', $request->company_id)
            ->first();

        return response()->json([
            'success' => true,
            'data' => new RequestResource($relation)
        ], 201);
    }

    public function show($id): JsonResource
    {
        $relation = DB::table('company_student')
            ->where('id', $id)
            ->first();

        if (!$relation) {
            return response()->json(['message' => 'Relation not found'], 404);
        }

        return new RequestResource($relation);
    }

    public function allRequests()
{
    $requests = DB::table('company_student')
        ->join('students', 'company_student.student_id', '=', 'students.id')
        ->join('companies', 'company_student.company_id', '=', 'companies.id')
        ->select(
            'company_student.*',
            'students.name as student_name',
            'students.email as student_email',
            'companies.name as company_name'
        )
        ->orderByDesc('company_student.created_at')
        ->get();

    return response()->json($requests);
}

    public function studentRequests($studentId): JsonResource
    {
        $student = Student::findOrFail($studentId);
        $requests = DB::table('company_student')
            ->where('student_id', $studentId)
            ->get();

        return RequestResource::collection($requests);
    }

    public function destroy(int $id): JsonResponse
    {
        $relation = DB::table('company_student')->where('id', $id)->first();

        if ($relation) {
            DB::table('company_student')->where('id', $id)->delete();
            return response()->json(['success' => 'Solicitud eliminada exitosamente.'], 200);
        } else {
            return response()->json(['error' => 'Solicitud no encontrada.'], 404);
        }
    }


    public function update(Request $request, int $id): JsonResponse
{
    $request->validate([
        'company_id' => 'required|exists:companies,id',
        'question' => 'required|string|max:255',
    ]);

    $relation = DB::table('company_student')->where('id', $id)->first();

    if (!$relation) {
        return response()->json(['error' => 'Solicitud no encontrada.'], 404);
    }

    DB::table('company_student')
        ->where('id', $id)
        ->update([
            'company_id' => $request->company_id,
            'question' => $request->question,
            'updated_at' => now(),
        ]);

    $updatedRelation = DB::table('company_student')->where('id', $id)->first();

    return response()->json([
        'success' => true,
        'data' => new RequestResource($updatedRelation)
    ], 200);
}

}