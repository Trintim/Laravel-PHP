<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id'
    ];

    public function produtos(){
        //pertence a muitos estabelecido por tabela auxiliar pedidos_produtos
        //return $this->belongsToMany(Produto::class, 'pedidos_produtos');
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at');
        /*
            1 - Modelo do relacionamento NxN em relação ao modelo que estamos implementando

            2 - É a tabela auxiliar que armazena os registros de ralacionamento

            3 - Representa o nome da FK da tabela mapeada pelo model na tabela de ralacionamento

            4 - Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que estamos relacionando
         */
    }
}
