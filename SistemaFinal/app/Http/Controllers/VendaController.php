<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelCliente;
use App\Models\ModelProduto;
use App\Models\ModelVenda;
use Illuminate\Http\Request;

class VendaController extends Controller

{
    public function produtoseClienteModal()
    {
        $listarProdutosModal = ModelProduto::all();
        $listarClientesModal = ModelCliente::all();

        return view("venda.create", compact('listarProdutosModal', 'listarClientesModal'));
    }

    public function adicionarProduto(Request $request)
    {
        $produtoSelecionado = $request->json()->all();

        // Faça o processamento necessário com os dados do produto selecionado

        // Retorne a resposta com o HTML da linha da tabela do produto adicionado
        $linhaTabela = '<tr>';
        $linhaTabela .= '<td>' . $produtoSelecionado['descricao'] . '</td>';
        $linhaTabela .= '<td>' . $produtoSelecionado['quantidade'] . '</td>';
        $linhaTabela .= '<td>' . $produtoSelecionado['valor_venda'] . '</td>';
        $linhaTabela .= '</tr>';

        return response($linhaTabela);
    }

    public function create()
    {
        return view('venda/create');

    }
}
