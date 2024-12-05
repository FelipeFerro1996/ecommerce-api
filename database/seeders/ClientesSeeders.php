<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            "nome"=>"Cliente 1",
            "email"=>"cliente1@gmail.com",
            "celular"=>'14996667979',
            "data_nascimento"=>"1996-08-28"
        ]);
        DB::table('clientes')->insert([
            "nome"=>"Cliente 2",
            "email"=>"cliente2@gmail.com",
            "celular"=>'14996667979',
            "data_nascimento"=>"1996-08-28"
        ]);
        DB::table('clientes')->insert([
            "nome"=>"Cliente 3",
            "email"=>"cliente3@gmail.com",
            "celular"=>'14996667979',
            "data_nascimento"=>"1996-08-28"
        ]);
        DB::table('clientes')->insert([
            "nome"=>"Cliente 4",
            "email"=>"cliente4@gmail.com",
            "celular"=>'14996667979',
            "data_nascimento"=>"1996-08-28"
        ]);
        
    }
}
