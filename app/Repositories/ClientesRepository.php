<?php

namespace App\Repositories;

use App\ClientesInterface;
use App\Models\Clientes;
use Exception;

class ClientesRepository implements ClientesInterface
{

    public function getAllClientes(){

        $clientes = new Clientes();
        return $clientes->paginate(10);

    }

    public function insertCliente($request = NULL): Clientes{

        $cliente = Clientes::create($request->all());
        return $cliente;

    }

    public function getClientebyId($id = NULL){
        $cliente = Clientes::find($id);

        return $cliente??NULL;
    }

    public function updateCliente($request = NULL, $id = NULL): Clientes{
        $cliente = Clientes::find($id);
        $cliente->update($request->all());
        return $cliente;
    }

    public function deleteCliente($id = NULL){

        $return = [
            'message'=>'Cliente excluído com sucesso',
            'sucesso'=>false
        ];

        try{

            $cliente = Clientes::find($id);

            if(empty($cliente->id)){
                throw new Exception('Usuário não existe');
            }

            $return['sucesso'] = $cliente->delete();

        }catch(Exception $e){
            $return['message'] = $e->getMessage();
        }

        return $return;
    }

}