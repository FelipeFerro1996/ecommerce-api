<?php

namespace App\Http\Controllers;

use App\ClientesInterface;
use App\Http\Requests\ClientesRequest;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function __construct(public ClientesInterface $clientes_repository) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = $this->clientes_repository->getAllClientes();
        return $clientes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientesRequest $request)
    {
        $cliente = $this->clientes_repository->insertCliente(request:$request);

        return response()->json([
            'message'=>'Cliente incluído com sucesso',
            'data'=>$cliente
        ], 203);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = $this->clientes_repository->getClienteById($id);

        if(empty($cliente->id)){
            return response()->json([
                'message'=>'Cliente não encontrado'
            ], 404);
        }

        return $cliente;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientesRequest $request, string $id)
    {
        $cliente = $this->clientes_repository->updateCliente(request:$request, id:$id);

        return response()->json([
            'message'=>'Cliente atualizado com sucesso',
            'data'=>$cliente
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $return = $this->clientes_repository->deleteCliente(id:$id);

        if(!$return['sucesso']){
            return response()->json($return, 404);
        }

        return response()->json($return, 200);
    }
}
