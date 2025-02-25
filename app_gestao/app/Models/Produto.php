<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [

        'nome',
        'descricao',
        'peso',
        'unidade_id',
    ];

    public function produtoDetalhe(){

        return $this->hasOne(ProdutoDetalhe::class);

        /* Produto tem 1 produtoDetalhe

           1 registro em produto_detalhes com base na (fk) -> produto_id
           produtos (pk) -> id
        */
    }
}
