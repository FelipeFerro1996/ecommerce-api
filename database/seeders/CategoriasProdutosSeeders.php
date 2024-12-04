<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriasProdutosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['descricao' => 'Categoria_1'],
            ['descricao' => 'Categoria_2'],
            ['descricao' => 'Categoria_3'],
            ['descricao' => 'Categoria_4'],
            ['descricao' => 'Categoria_5']
        ]);
        
    }
}
