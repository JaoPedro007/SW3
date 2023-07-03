<?php

namespace App\Http\Controllers;

use App\Models\ModelDepartamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index(){
        $listarTodosDepartamentos=ModelDepartamento::all();
        return view("departamento/index",compact('listarTodosDepartamentos'));
    }



    public function create()
    {
        $departamentos=ModelDepartamento::all();
        return view('departamento/create',compact('departamentos'));

    }
    public function store(Request $request)
    {

        $cad=ModelDepartamento::create([

            'nome'=>$request->nome,
            'descricao'=>$request->descricao
        ]);
        if($cad){
            return redirect('departamentos');

        }
    }

    public function edit($id)
    {
        $departamento=ModelDepartamento::find($id);
        return view('departamento/edit',compact('departamento'));
    }

    public function update(Request $request, $id)
    {
        ModelDepartamento::where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,

        ]);
        return redirect('departamentos');
    }

    public function destroy($id)
    {
        ModelDepartamento::destroy($id);
        return redirect()->route('departamentos');

    }

}
