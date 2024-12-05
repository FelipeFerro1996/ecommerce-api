<?php

namespace App;

use App\Models\Pagamentos;

interface PagamentosInterface
{
    public function insertPagamento($request = NULL);
}
