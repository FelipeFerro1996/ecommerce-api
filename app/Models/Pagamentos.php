<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamentos extends Model
{
    protected $table = 'pagamentos';
    protected $fillable = ['pedido_id', 'metodo', 'data_pagamento', 'valor_pago'];
}
