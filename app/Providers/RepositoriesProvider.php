<?php

namespace App\Providers;

use App\ClientesInterface;
use App\Repositories\ClientesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public array $bindings = [
        ClientesInterface::class => ClientesRepository::class
    ];
}
