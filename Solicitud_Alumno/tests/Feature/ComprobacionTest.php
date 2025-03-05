<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;

class ComprobacionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test CRUD operations for Company.
     */
    public function test_company_crud_operations(): void
    {
        // Crear una compañía de prueba y autenticarlo
        $user = User::factory()->createOne();
        $this->actingAs($user, 'sanctum');

        // Crear una nueva compañía
        $companyData = [
            'name' => 'Test Company',
            'website' => 'https://www.testcompany.com',
            'NIF' => 'B12345678',
        ];

        $response = $this->postJson('/api/company', $companyData);
        $response->assertStatus(201)
                 ->assertJsonFragment($companyData);

        $companyId = $response->json('data.id'); // Asegúrate de que la respuesta contiene 'data.id'

        // Leer la compañía
        $response = $this->getJson("/api/company/{$companyId}");
        $response->assertStatus(200)
                 ->assertJsonFragment($companyData);

        // Actualizar la compañía
        $updatedCompanyData = [
            'name' => 'Updated Test Company',
            'website' => 'https://www.updatedtestcompany.com',
            'NIF' => 'B87654321',
        ];

        $response = $this->putJson("/api/company/{$companyId}", $updatedCompanyData);
        $response->assertStatus(200)
                 ->assertJsonFragment($updatedCompanyData);

        // Eliminar la compañía
        $response = $this->deleteJson("/api/company/{$companyId}");
        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        // Verificar que la compañía ha sido eliminada
        $response = $this->getJson("/api/company/{$companyId}");
        $response->assertStatus(404);
    }
}