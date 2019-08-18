<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = "contatos"; //referencia a tabela que já existe
    protected $primaryKey = "id"; // chave primária
}
