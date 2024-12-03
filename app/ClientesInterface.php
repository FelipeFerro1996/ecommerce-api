<?php

namespace App;

use App\Models\Clientes;

interface ClientesInterface
{
    public function getAllClientes();

    public function insertCliente($request = NULL);
}
