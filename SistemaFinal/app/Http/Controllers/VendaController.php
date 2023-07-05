<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelCliente;
use App\Models\ModelProduto;
use App\Models\ModelVenda;
use Illuminate\Http\Request;

class VendaController extends Controller

{
    public function produtosModal()
    {
        $listarProdutosModal = ModelProduto::all();
        return view("venda/create", compact('listarProdutosModal'));
    }


    public function clientesModal()
    {
        $listarClientesModal = ModelCliente::all();
        return view("venda/create", compact('listarClientesModal'));

    }




    public function create()
    {
        return view('venda/create');

    }
}
