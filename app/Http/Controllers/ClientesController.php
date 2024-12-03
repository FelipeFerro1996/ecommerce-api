<?php

namespace App\Http\Controllers;

use App\ClientesInterface;
use App\Http\Requests\ClientesRequest;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function __construct(public ClientesInterface $clientes_repository) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = $this->clientes_repository->getAllClientes();
        return response()->json([$clientes], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientesRequest $request)
    {
        $cliente = $this->clientes_repository->insertCliente(request:$request);

        return response()->json([$cliente], 203);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
