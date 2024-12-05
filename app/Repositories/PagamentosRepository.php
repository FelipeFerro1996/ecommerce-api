<?php

namespace App\Repositories;

use App\Models\Pagamentos;
use App\Models\Pedidos;
use App\PagamentosInterface;
use Exception;

class PagamentosRepository implements PagamentosInterface
{

    public function insertPagamento($request = NULL){

        $return = [
            'message'=>'Pagamento cadastrado com sucesso',
            'sucesso'=>false
        ];

        try{

            $pedido = Pedidos::find($request->pedido_id);

            if($pedido->status == 'pago'){
                throw new Exception('O pedido já está pago');
            }

            $return['sucesso'] = true;

            $return['pagamento'] = Pagamentos::create($request->all());

            $pedido->status = 'pago';
            $pedido->save();

        }catch(Exception $e){
            $return['message'] = $e->getMessage();
        }

        return $return;

       

    }

}