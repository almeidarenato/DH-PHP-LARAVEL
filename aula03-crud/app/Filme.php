<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genero;
use App\Ator;

class Filme extends Model
{
    protected $table = "filmes"; //referencia a tabela que já existe
    protected $primaryKey = "id"; // chave primária
    protected $fillable = ['titulo', 'sinopse', 'imagem', 'id_genero', 'id_protagonista'];
    public function genero()
    {
        return $this->hasOne(Genero::class, 'id', 'id_genero');
    }
    public function ator()
    {
        return $this->hasOne(Ator::class, 'id', 'id_protagonista');
    }
}
