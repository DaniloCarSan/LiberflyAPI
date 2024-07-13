<?php

namespace Tests\Feature\App\Http\Controllers\Api\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ListControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->refreshDatabase();
        $this->seed();
    }

    public function test_deve_listar_os_clientes(): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $response = $this->get('/api/customers');

        $response->assertStatus(Response::HTTP_OK);
    }
}
