@extends('templates.template')
@section('content')
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <style>
        #btn-produto, #btn-cliente, #btn-pagamento, #btn-finalizar {
            margin-left: 1%;
            margin-top: 5%
        }

        #btn-produto {
            background-color: #5C4033;

        }

        #btn-pagamento {
            background-color: #48c928;

        }

        #input-total {
            margin-top: 5%;
            margin-left: 72%;
        }

        #modalCliente, #modalProduto {
            width: 500px;
            margin-left: 35%;
        }

        .selectable {
            cursor: pointer;
        }

    </style>

    <h1 class="text-center">PDV</h1>
    <hr>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('vendas/finalizar')}}">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor venda</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_selecionado'])) {
                    $produtoSelecionado = $_POST['produto_selecionado'];
                    $descricao = $produtoSelecionado['descricao'];
                    $quantidade = $produtoSelecionado['1'];
                    $valorVenda = $produtoSelecionado['valor_venda'];

                    echo '<tr>';
                    echo '<td>' . $descricao . '</td>';
                    echo '<td>' . "1" . '</td>';
                    echo '<td>' . $valorVenda . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>

            </table>
            <!--Totalizadores e nome do cliente-->
            <div id='input-total' class="input-group mb-3">
                <input type="string" placeholder="Cliente: " style="width: 20em">
                <input id="valor_total" type="int" placeholder="Total:" style="width: 7em; margin-left:10px" readonly>
            </div>

            <div class="input-group mb-3">

                <!--Button produto-->
                <button id="btn-produto" type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#modalProduto">
                    Produto
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modalProduto" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 500px">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Produtos</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>

                            <table class="table table-light table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor venda</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($listarProdutosModal as $produto)
                                    <tr >
                                        <td><input type="checkbox" name="idProduto" value="{{ $produto->id}}"></td>
                                        <td>{{ $produto->descricao }}</td>
                                        <td>{{$produto->quantidade}}</td>
                                        <td>R$ {{ $produto->valorVenda }}</td>
                                    </tr>
                                @endforeach
                                </tbody>



                            </table>
                            <div class="modal-footer">


                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" onclick="listarProdutos(), calcularValorTotal()">Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Button Cliente-->
                <button id="btn-cliente" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalCliente">
                    Cliente
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalCliente" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 500px">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Clientes</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <table class="table table-light table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF/CNPJ</th>
                                    <th scope="col">Endereço</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($listarClientesModal as $cliente)
                                    <tr>
                                        <td>{{ $cliente->nome }}</td>
                                        <td>{{ $cliente->cpfCnpj }}</td>
                                        <td>{{ $cliente->cidade . " " . $cliente->estado }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary">Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>


                <button id='btn-pagamento' type="button" class="btn btn-info">Pagamento</button>
                <button id='btn-finalizar' class="btn btn-success" type="submit">Finalizar</button>

            </div>


        </form>
    </div>

    <script>
        function listarProdutos() {
            // Obtenha o valor selecionado do produto
            var produtoSelecionado = {
                descricao: '',
                quantidade: '',
                valor_venda: ''
            };

            var checkboxes = document.querySelectorAll('input[name="idProduto"]:checked');
            if (checkboxes.length > 0) {
                var selectedCheckbox = checkboxes[0];
                var row = selectedCheckbox.closest('tr');
                var columns = row.getElementsByTagName('td');

                produtoSelecionado.descricao = columns[1].textContent;
                produtoSelecionado.quantidade = columns[2].textContent;
                produtoSelecionado.valor_venda = columns[3].textContent;

                // Adicione o produto na tabela
                var tbody = document.querySelector('table tbody');
                var newRow = document.createElement('tr');
                newRow.innerHTML = '<td>' + produtoSelecionado.descricao + '</td>' +
                    '<td>' + produtoSelecionado.quantidade + '</td>' +
                    '<td>' + produtoSelecionado.valor_venda + '</td>';
                tbody.appendChild(newRow);
            }
        }

    </script>
</body>
</html>

@endsection
