<?php

namespace App;

use App\Models\Produtos;

interface ProdutosInterface
{
    public function getAllProdutos($request);

    public function insertProduto($request = NULL): Produtos;

    public function updateProduto($request = NULL, $id = NULL): Produtos;

    public function getProdutobyId($id = NULL);

    public function deleteProduto($id = NULL);
}
