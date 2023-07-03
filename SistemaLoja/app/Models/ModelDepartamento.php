<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDepartamento extends Model
{

    use HasFactory;
    protected $fillable=['nome','descricao'];

    protected $table='departamento';

}
