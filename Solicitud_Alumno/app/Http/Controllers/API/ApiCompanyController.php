<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ApiCompanyRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ApiCompanyResource;

class ApiCompanyController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
       
        return ApiCompanyResource::collection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiCompanyRequest $request): JsonResponse
    {
        $company = Company::create($request->all());
        return response()->json([
            'success' => true,
            'data' => new ApiCompanyResource($company)
        ], 201); // El estado 201 corresponde a una creación correcta
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResource
    {
        // Busca un elemento con su ID y lo devuelve
        $company = Company::find($id);
        if ($company) {
            return new ApiCompanyResource($company);
        } else {
            return new JsonResource(['error' => 'Company not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiCompanyRequest $request, int $id): JsonResource
{
    $company = Company::find($id);
    if ($company) {
        $company->name = $request->name;
        $company->website = $request->website;
        $company->NIF = $request->NIF;
        $company->save(); // Guardamos los cambios
        return new ApiCompanyResource($company);
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