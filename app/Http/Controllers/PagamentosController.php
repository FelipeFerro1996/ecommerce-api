<?php

namespace App\Http\Controllers;

use App\Http\Requests\pagamentosRequest;
use App\PagamentosInterface;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    public function __construct(public PagamentosInterface $pagamentos_repository) {
        
    }

    public function store(pagamentosRequest $request){
        $return = $this->pagamentos_repository->insertPagamento(request:$request);

        if(!$return['sucesso']){
            return response()->json($return, 409);
        }

        return response()->json([
            'message'=>$return['message'],
            'data'=>$return['pagamento']
        ], 203);

    }
}
