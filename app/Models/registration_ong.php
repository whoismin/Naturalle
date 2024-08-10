<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cadastroong extends Model
{
    protected $table = 'cadastroong';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'CNPJ',
        'tipo_ong',
        'observacoes',
        'data_cadastro'
    ];
}
