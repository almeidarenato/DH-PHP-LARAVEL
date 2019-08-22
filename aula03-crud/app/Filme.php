<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = "filmes"; //referencia a tabela que já existe
    protected $primaryKey = "id"; // chave primária
    protected $fillable = ['titulo', 'sinopse'];
}
