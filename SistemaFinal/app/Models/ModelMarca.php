<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMarca extends Model
{
    use HasFactory;
    protected $fillable=['nome','descricao'];

    protected $table='marca';
}
