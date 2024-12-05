<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosProdutos extends Model
{
    protected $table = 'pedidos_produtos';

    protected $fillable = ['quantidade', 'preco_unitario', 'pedido_id', 'produto_id'];

    public function produto(){
        return $this->belongsTo(Produtos::class,'produto_id');
    } 
}
