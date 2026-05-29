<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $fillable = [
        'id_produto', 'marca', 'modelo'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class,'id_produto' );
    }
}
