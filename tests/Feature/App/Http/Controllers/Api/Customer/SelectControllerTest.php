<?php

namespace Tests\Feature\App\Http\Controllers\Api\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SelectControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->refreshDatabase();
    }

    public function test_deve_obter_um_cliente_especifico_pelo_id(): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $customer = Customer::factory()->create([
            'name' => 'João Paulo',
            'email' => 'joao.paulo@gmail.com'
        ]);

        $response = $this->get('/api/customers/' . $customer->getId());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_deve_obter_um_ao_erro_buscar_um_cliente_que_nao_existe(): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        Customer::factory()->create([
            'name' => 'João Paulo',
            'email' => 'joao.paulo@gmail.com'
        ]);

        $response = $this->get('/api/customers/999999');

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
