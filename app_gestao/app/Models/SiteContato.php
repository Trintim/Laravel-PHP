<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;

    //protected $table = 'site_contatos';

    protected $fillable = [

        'name',
        'telefone',
        'email',
        'motivo_contatos_id',
        'message',
    ];
}
