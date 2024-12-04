<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';

    protected $fillable = ['descricao', 'preco', 'estoque'];

    public function categorias(){
        return $this->belongsToMany(
            Categorias::class, 'categorias_produtos','produto_id','categoria_id'
        );
    }
}
