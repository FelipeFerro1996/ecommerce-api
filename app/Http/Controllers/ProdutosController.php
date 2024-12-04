<?php

namespace App\Http\Controllers;

use App\ProdutosInterface;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function __construct(public ProdutosInterface $produtos_repository) {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = $this->produtos_repository->getAllProdutos(request:$request);
        return $produtos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = $this->produtos_repository->insertProduto(request:$request);

        return response()->json([
            'message'=>'Produto incluído com sucesso',
            'data'=>$produto
        ], 203);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = $this->produtos_repository->getProdutobyId($id);

        if(empty($produto->id)){
            return response()->json([
                'message'=>'Produto não encontrado'
            ], 404);
        }

        return $produto;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = $this->produtos_repository->updateProduto(request:$request, id:$id);

        return response()->json([
            'message'=>'Produto atualizado com sucesso',
            'data'=>$produto
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $return = $this->produtos_repository->deleteProduto(id:$id);

        if(!$return['sucesso']){
            return response()->json($return, 404);
        }

        return response()->json($return, 200);
    }
}
