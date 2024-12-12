<?php

namespace Tests\Unit;

use App\ClientesInterface;
use App\Http\Requests\ClientesRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientesrepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_insert_cliente()
    {
        $repository = $this->app->make(ClientesInterface::class);
        $request = new ClientesRequest([
            'nome' => 'Cliente 1',
            'email' => 'cliente1@gmail.com',
            'data_nascimento' => date('Y-m-d'),
            'celular' => '14996667979',
        ]);
        $repository->insertCliente($request);

        $this->assertDatabaseHas('clientes', ['nome'=>'Cliente 1']);
    }

    public function test_update_cliente()
    {
        $repository = $this->app->make(ClientesInterface::class);
        $request = new ClientesRequest([
            'nome' => 'Cliente 2',
            'email' => 'cliente1@gmail.com',
            'data_nascimento' => date('Y-m-d'),
            'celular' => '14996667979',
            'id' =>1
        ]);
        $repository->insertCliente($request);

        $this->assertDatabaseHas('clientes', ['nome'=>'Cliente 2']);
    }

    public function test_delete_cliente(){
        $repository = $this->app->make(ClientesInterface::class);

        $request = new ClientesRequest([
            'nome' => 'Cliente Excluido',
            'email' => 'cliente1@gmail.com',
            'data_nascimento' => date('Y-m-d'),
            'celular' => '14996667979',
        ]);
        $cliente = $repository->insertCliente($request);

        $repository->deleteCliente($cliente->id);
        
        $this->assertDatabaseMissing('clientes', ['id'=>$cliente->id]);
    }
}