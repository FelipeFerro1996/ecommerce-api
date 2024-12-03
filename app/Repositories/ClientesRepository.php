<?php

namespace App\Repositories;

use App\ClientesInterface;
use App\Models\Clientes;

class ClientesRepository implements ClientesInterface
{

    public function getAllClientes(){

        $clientes = new Clientes();
        return $clientes->paginate(10);

    }

    public function insertCliente($request = NULL){

        $cliente = Clientes::create($request->all());
        return $cliente;

    }

}