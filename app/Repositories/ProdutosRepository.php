<?php

namespace App\Repositories;

use App\Models\CategoriasProdutos;
use App\Models\Produtos;
use App\ProdutosInterface;
use Exception;

class ProdutosRepository implements ProdutosInterface {

    public function getAllProdutos($request = NULL){
        $produtos = new Produtos();

        if(!empty($request->categorias)){
            $produtos = $produtos->wherehas('categorias', function($query) use ($request){
                $query->where('descricao', 'LIKE', '%'.$request->categorias.'%');
            });
        }

        if(!empty($request->preco_inicial)){
            $produtos = $produtos->where('preco', '>=', $request->preco_inicial);
        }

        if(!empty($request->preco_final)){
            $produtos = $produtos->where('preco', '<=', $request->preco_final);
        }

        $produtos = $produtos->with('categorias')->paginate(10);
        return $produtos;
    }

    public function insertProduto($request = NULL): Produtos{
        $produto = Produtos::create($request->all());

        foreach($request->categorias??[] as $categoria){
            CategoriasProdutos::create([
                'produto_id'=>$produto->id,
                'categoria_id'=>$categoria
            ]);
        }

        return $produto;
    }

    public function updateProduto($request = NULL, $id = NULL): Produtos{
        $produto = Produtos::find($id);
        $produto->update($request->all());

        return $produto;
    }

    public function getProdutobyId($id = NULL){
        $produto = Produtos::find($id);
        return $produto;
    }

    public function deleteProduto($id = NULL){
        $return = [
            'message'=>'Produto excluído com sucesso',
            'sucesso'=>false
        ];

        try{

            $produto = Produtos::find($id);

            if(empty($produto->id)){
                throw new Exception('Produto não existe');
            }

            $return['sucesso'] = $produto->delete();

        }catch(Exception $e){
            $return['message'] = $e->getMessage();
        }

        return $return;
    }

}