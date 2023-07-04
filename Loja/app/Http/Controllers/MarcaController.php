<?php

namespace App\Http\Controllers;

use App\Models\ModelMarca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){
        $listarTodasMarcas=ModelMarca::all();
        return view("marca/index",compact('listarTodasMarcas'));
    }



    public function create()
    {
        $marcas=ModelMarca::all();
        return view('marca/create',compact('marcas'));

    }
    public function store(Request $request)
    {

        $cad=ModelMarca::create([

            'nome'=>$request->nome,
            'descricao'=>$request->descricao
        ]);
        if($cad){
            return redirect('marcas');

        }
    }

    public function edit($id)
    {
        $marca=ModelMarca::find($id);
        return view('marca/edit',compact('marca'));
    }

    public function update(Request $request, $id)
    {
        ModelMarca::where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,

        ]);
        return redirect('marcas');
    }

    public function destroy($id)
    {
         ModelMarca::destroy($id);
        return redirect()->route('marcas');

    }
}
