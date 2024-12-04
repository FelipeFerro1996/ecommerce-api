<?php

namespace App;

use App\Models\Clientes;

interface ClientesInterface
{
    public function getAllClientes();

    public function insertCliente($request = NULL): Clientes;

    public function updateCliente($request = NULL, $id = NULL): Clientes;

    public function getClientebyId($id = NULL);

    public function deleteCliente($id = NULL);
}
