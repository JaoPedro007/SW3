<?php

namespace App\Http\Controllers;

use App\Models\ModelDepartamento;
use App\Models\ModelMarca;
use App\Models\ModelProduto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $listarTodosProdutos=ModelProduto::all();
        return view("produto/index",compact('listarTodosProdutos'));
    }

    public function create()
    {
        $produtos=ModelProduto::all();
        $departamentos=ModelDepartamento::all();
        $marcas=ModelMarca::all();

        return view('produto/create',compact('produtos','departamentos', 'marcas'));

    }


    public function store(Request $request)
    {

        $cad=ModelProduto::create([

            'descricao'=>$request->descricao,
            'quantidade'=>$request->quantidade,
            'valorCusto'=>$request->valorCusto,
            'valorVenda'=>$request->valorVenda,
            'id_departamento'=>$request->id_departamento,
            'id_marca'=>$request->id_marca

        ]);
        if($cad){
            return redirect('produtos');

        }
    }

    public function edit($id)
    {
        $produto=ModelProduto::find($id);
        $departamentos=ModelDepartamento::all();
        $marcas=ModelMarca::all();
        return view('produto/edit',compact('produto','departamentos', 'marcas'));
    }

    public function update(Request $request, $id)
    {
        ModelProduto::where(['id'=>$id])->update([
            'descricao'=>$request->descricao,
            'quantidade'=>$request->quantidade,
            'valorCusto'=>$request->valorCusto,
            'valorVenda'=>$request->valorVenda,
            'id_departamento'=>$request->id_departamento,
            'id_marca'=>$request->id_marca
        ]);
        return redirect('produtos');
    }

    public function destroy($id)
    {
        $del=ModelProduto::destroy($id);
        return redirect('produtos');
    }

}
