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
            ['descricao' => Str::random(1).'Categoria'],
            ['descricao' => Str::random(1).'Categoria'],
            ['descricao' => Str::random(1).'Categoria'],
            ['descricao' => Str::random(1).'Categoria'],
            ['descricao' => Str::random(1).'Categoria']
        ]);
        
    }
}
