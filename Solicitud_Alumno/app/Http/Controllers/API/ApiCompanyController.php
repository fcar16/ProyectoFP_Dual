<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ApiCompanyRequest;

class ApiCompanyController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // Recuperamos todos los elementos
        $companies = Company::all();
        // Enviamos esos datos mediante un formato de API RESTFUL con JSON
        return response()->json($companies, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiCompanyRequest $request): JsonResponse
    {
        Company::create($request->all());
        return response()->json([
            'success' => true
        ], 201); // El estado 201 corresponde a la creación correcta de un nuevo elemento
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        // Busca un elemento con su ID y lo devuelve
        $company = Company::find($id);
        if ($company) {
            return response()->json($company, 200);
        } else {
            return response()->json(['error' => 'Company not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiCompanyRequest $request, int $id): JsonResponse
    {
        $company = Company::find($id);
        if ($company) {
            $company->name = $request->name;
            $company->website = $request->website;
            $company->NIF = $request->NIF;
            $company->save(); // Guardamos los cambios
            return response()->json([
                'success' => true
            ], 200); // El estado 200 corresponde a una actualización correcta
        } else {
            return response()->json(['error' => 'Company not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return response()->json([
                'success' => true
            ], 200); // El estado 200 corresponde a una eliminación correcta
        } else {
            return response()->json(['error' => 'Company not found'], 404);
        }
    }
}