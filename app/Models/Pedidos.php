<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';

    protected $fillable = ['cliente_id', 'status'];

    public function pedidosProdutos(){
        return $this->hasMany(PedidosProdutos::class, 'pedido_id')->with('produto');
    }

}
