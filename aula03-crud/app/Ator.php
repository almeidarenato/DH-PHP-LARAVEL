<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ator extends Model
{
    protected $table = "atores"; //referencia a tabela que já existe
    protected $primaryKey = "id"; // chave primária
    protected $fillable = ['nome'];
    public function filmes()
    {
        return $this->hasMany(Filme::class, 'id_protagonista', 'id');
    }
}
