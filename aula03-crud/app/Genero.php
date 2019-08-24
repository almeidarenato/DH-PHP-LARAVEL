<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = "generos"; //referencia a tabela que já existe
    protected $primaryKey = "id"; // chave primária
    protected $fillable = ['descricao'];
}
