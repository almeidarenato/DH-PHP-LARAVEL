<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Genero extends Model
{
    protected $table = "generos"; //referencia a tabela que já existe
    protected $primaryKey = "id"; // chave primária
    protected $fillable = ['descricao'];
    public function filmes()
    {
        return $this->hasMany(Filme::class, 'id_genero', 'id');
    }
}
