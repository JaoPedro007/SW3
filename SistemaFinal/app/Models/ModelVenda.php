<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelVenda extends Model
{
    use HasFactory;

    protected $fillable=['descricao','valorVenda'];

    protected $table='produto';
}
