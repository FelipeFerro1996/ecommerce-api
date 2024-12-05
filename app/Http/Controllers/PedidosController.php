<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidosRequest;
use App\Http\Requests\UpdateStatusPedidoRequest;
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
        $pedido = $this->pedidos_repository->getPedidobyId(id:$id);

        if(empty($pedido->id)){
            return response()->json([
                'message'=>'Pedido não encontrado'
            ], 404);
        }

        return $pedido;
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
        $return = $this->pedidos_repository->deletePedido(id:$id);

        if(!$return['sucesso']){
            return response()->json($return, 404);
        }

        return response()->json($return, 200);
    }

    public function updateStatus($id, UpdateStatusPedidoRequest $request){
        $return = $this->pedidos_repository->updateStatus(id:$id, status:$request->status);

        if(!$return['sucesso']){
            return response()->json($return, 404);
        }

        return response()->json([
            'message'=>$return['message'],
            'data'=>$return['pedido']
        ]);
    }
}
