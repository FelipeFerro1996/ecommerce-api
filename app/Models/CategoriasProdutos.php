<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriasProdutos extends Model
{
    protected $table = 'categorias_produtos';
    
    protected $fillable = ['produto_id', 'categoria_id'];
}
