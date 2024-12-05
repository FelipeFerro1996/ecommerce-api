<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos')->insert([
            'descricao'=>'produto 1',
            'preco' => 10.50,
            'estoque' => 10
        ]);
        DB::table('categorias_produtos')->insert([
            'produto_id'=>1,
            'categoria_id'=>1
        ]);
        DB::table('categorias_produtos')->insert([
            'produto_id'=>1,
            'categoria_id'=>2
        ]);

        DB::table('produtos')->insert([
            'descricao'=>'produto 2',
            'preco' => 10.50,
            'estoque' => 10
        ]);
        DB::table('categorias_produtos')->insert([
            'produto_id'=>2,
            'categoria_id'=>1
        ]);
        DB::table('categorias_produtos')->insert([
            'produto_id'=>2,
            'categoria_id'=>2
        ]);

        DB::table('produtos')->insert([
            'descricao'=>'produto 3',
            'preco' => 10.50,
            'estoque' => 10
        ]);
        DB::table('categorias_produtos')->insert([
            'produto_id'=>3,
            'categoria_id'=>1
        ]);
        DB::table('categorias_produtos')->insert([
            'produto_id'=>3,
            'categoria_id'=>2
        ]);
    }
}
