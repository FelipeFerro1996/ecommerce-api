<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidosRequest;
use App\PedidosInterface;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function __construct(public PedidosInterface $pedidos_repository) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pedidos = $this->pedidos_repository->getAllPedidos();

        return $pedidos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PedidosRequest $request)
    {
        $pedido = $this->pedidos_repository->insertPedido(request:$request);

        return response()->json([
            'message'=>'Pedido incluído com sucesso',
            'data'=>$pedido
        ], 203);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
