<?php

namespace App\Http\Controllers;

use App\Models\ModelCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $listarTodosClientes=ModelCliente::all();
        return view("cliente/index",compact('listarTodosClientes'));
    }
    public function clientesModal()
    {
        $listarClientesModal = ModelCliente::all();
        return view("venda/create", compact('listarClientesModal'));

    }

    public function create()
    {
        $clientes=ModelCliente::all();

        return view('cliente/create',compact('clientes'));

    }


    public function store(Request $request)
    {

        $cad=ModelCliente::create([

            'nome'=>$request->nome,
            'cpfCnpj'=>$request->cpfCnpj,
            'estado'=>$request->estado,
            'cidade'=>$request->cidade,
            'bairro'=>$request->bairro,
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'cep'=>$request->cep

        ]);
        if($cad){
            return redirect('clientes');

        }
    }

    public function edit($id)
    {
        $clientes=ModelCliente::find($id);
        return view('cliente/edit',compact('clientes'));
    }

    public function update(Request $request, $id)
    {
        ModelCliente::where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'cpfCnpj'=>$request->cpfCnpj,
            'estado'=>$request->estado,
            'cidade'=>$request->cidade,
            'bairro'=>$request->bairro,
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'cep'=>$request->cep
        ]);
        return redirect('clientes');
    }

    public function destroy($id)
    {
        $del=ModelCliente::destroy($id);
        return redirect('clientes');
    }
}
