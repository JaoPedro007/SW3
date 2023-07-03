<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCliente extends Model
{
    use HasFactory;

    protected $fillable=['nome','cpfCnpj','estado','cidade','bairro', 'rua', 'numero', 'cep'];

    protected $table='cliente';
}
