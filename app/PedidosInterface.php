<?php

namespace App;

use App\Models\Pedidos;

interface PedidosInterface
{
    public function getAllPedidos();

    public function insertPedido($request = NULL): Pedidos;

    public function updatePedido($request = NULL, $id = NULL): Pedidos;

    public function getPedidobyId($id = NULL);

    public function deletePedido($id = NULL);

    public function updateStatus($id = NULL, $status = NULL);
}
