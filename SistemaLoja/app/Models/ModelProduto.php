<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ModelProduto extends Model
{
    use HasFactory;
    protected $fillable=['descricao','quantidade','valorCusto','valorVenda','id_departamento', 'id_marca'];

    protected $table='produto';


    public function relDepart(){

        return $this->hasOne('App\Models\ModelDepartamento','id','id_departamento');
    }
    public function relMarc(){

        return $this->hasOne('App\Models\ModelMarca','id','id_marca');
    }
}
