<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o OBJ
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor100';
        $fornecedor->site = 'Fornecedor100.com.br';
        $fornecedor->uf = 'ES';
        $fornecedor->email = 'contato@Fornecedor100.com.br';
        $fornecedor->save();

        //utilizando metodo create (atenção ao model)
        Fornecedor::create([
            'nome' => 'Fornecedor200',
            'site' => 'Fornecedor200.com.br',
            'uf' => 'SP',
            'email'=> 'contato@Fornecedor200.com.br',
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor300',
            'site' => 'Fornecedor300.com.br',
            'uf' => 'BA',
            'email'=> 'contato@Fornecedor300.com.br',
        ]);
    }
}
