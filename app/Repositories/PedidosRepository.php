<?php

namespace App\Repositories;

use App\Models\Pedidos;
use App\Models\PedidosProdutos;
use App\PedidosInterface;
use Exception;

class PedidosRepository implements PedidosInterface
{

    public function getAllPedidos(){
        $pedidos = Pedidos::with('pedidosProdutos')->with('pagamento')->paginate(10);
        return $pedidos;
    }

    public function insertPedido($request = NULL): Pedidos{

        $pedido = Pedidos::create([
            'cliente_id'=>$request->cliente_id,
            'status'=>'pendente'
        ]);

        foreach($request->produtos??[] as $produto){
            PedidosProdutos::create([
                'produto_id'=>$produto['id'],
                'pedido_id'=>$pedido->id,
                'quantidade'=>$produto['quantidade'],
                'preco_unitario'=>$produto['preco_unitario']
            ]);
        }

        return Pedidos::with('pedidosProdutos')->with('pagamento')->find($pedido->id);
    }

    public function updatePedido($request = NULL, $id = NULL): Pedidos{
        $pedido = Pedidos::find($id);
        $pedido->update($request->all());

        return $pedido;
    }

    public function getPedidobyId($id = NULL){
        $pedido = Pedidos::with('pedidosProdutos')->with('pagamento')->find($id);
        return $pedido;
    }

    public function deletePedido($id = NULL){
        $return = [
            'message'=>'Pedido excluído com sucesso',
            'sucesso'=>false
        ];

        try{

            $pedido = Pedidos::find($id);

            if(empty($pedido->id)){
                throw new Exception('Pedido não existe');
            }

            if(!empty($pedido->pedidosProdutos)){
                $pedido->pedidosProdutos()->delete();
            }

            $return['sucesso'] = $pedido->delete();

        }catch(Exception $e){
            $return['message'] = $e->getMessage();
        }

        return $return;
    }

    public function updateStatus($id = NULL, $status = NULL){

        $return = [
            'message'=>'Alterado status do pedido para cancelado',
            'sucesso'=>false
        ];

        try{

            $pedido = Pedidos::find($id);

            if(empty($pedido->id)){
                throw new Exception('Pedido não existe');
            }

            if($pedido->status == 'pago'){
                throw new Exception('O pedido já está pago');
            }

            $pedido->status = $status;

            $return['sucesso'] = $pedido->save();;
            $return['pedido'] = $pedido;

        }catch(Exception $e){
            $return['message'] = $e->getMessage();
        }

        return $return;
    }

}