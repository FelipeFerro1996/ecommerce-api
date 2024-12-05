<?php

namespace App\Providers;

use App\ClientesInterface;
use App\PedidosInterface;
use App\ProdutosInterface;
use App\Repositories\ClientesRepository;
use App\Repositories\PedidosRepository;
use App\Repositories\ProdutosRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public array $bindings = [
        ClientesInterface::class => ClientesRepository::class,
        ProdutosInterface::class => ProdutosRepository::class,
        PedidosInterface::class => PedidosRepository::class
    ];
}
