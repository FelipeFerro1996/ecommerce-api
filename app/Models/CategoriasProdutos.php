<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriasProdutos extends Model
{
    protected $table = 'categorias_produtos';
    
    protected $fillable = ['cliente_id', 'categoria_id'];
}
