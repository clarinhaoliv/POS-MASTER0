<?php

namespace App\Models;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'fornecedor_id', 'nome', 'preco', 'quantidade', 'estoque_minimo', 'cor', 'material', 'garantia_estendida',
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }
}
