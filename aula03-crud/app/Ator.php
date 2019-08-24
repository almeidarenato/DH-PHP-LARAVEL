<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ator extends Model
{
    protected $table = "atores"; //referencia a tabela que já existe
    protected $primaryKey = "id"; // chave primária
    protected $fillable = ['nome'];
}
