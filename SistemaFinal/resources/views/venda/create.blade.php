@extends('templates.template')
@section('content')
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <style>
        #btn-produto,
        #btn-cliente,
        #btn-pagamento,
        #btn-finalizar {
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
            display: flex;
            justify-content: space-between;
        }

        #modalSucesso,
        #modalCliente,
        #modalProduto {
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor venda</th>
                </tr>
            </thead>
            <tbody>
                <!--Function do Javascript-->

            </tbody>

        </table>
        <!--Totalizadores e nome do cliente-->
        <div id='input-total' class="input-group mb-3">
            <input id="clienteInput" type="string" placeholder="Cliente: " style="width: 20em">
            <input id="valor_total" type="int" placeholder="Total:" style="width: 7em; margin-left:10px" readonly>
        </div>

        <div class="input-group mb-3">

            <!--Button produto-->
            <button id="btn-produto" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalProduto">
                Produto
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modalProduto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 500px">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Produtos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <tr>
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
                            <button type="button" class="btn btn-primary" onclick="listarProdutos(); calcularValorTotal()">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!--Button Cliente-->
            <button id="btn-cliente" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCliente">
                Cliente
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 500px">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Clientes</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <table class="table table-light table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF/CNPJ</th>
                                    <th scope="col">Endereço</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listarClientesModal as $cliente)
                                <tr>
                                    <td><input type="checkbox" name="idCliente" value="{{ $cliente->id}}"></td>

                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->cpfCnpj }}</td>
                                    <td>{{ $cliente->cidade . " " . $cliente->estado }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary" onclick="adicionarCliente()">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!--Button pagamento-->

            <div class="btn-group" id="btn-pagamento">
                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
                    Pagamento
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Cartão</a></li>
                    <li><a class="dropdown-item" href="#">Pix</a></li>
                    <li><a class="dropdown-item" href="#">Dinheiro</a></li>
                </ul>
            </div>



            <button id="btn-finalizar" class="btn btn-success" onclick="exibirModalSucesso()">Finalizar</button>

            <!-- Modal de Sucesso -->
            <div class="modal fade" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="modalSucessoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSucessoLabel">Sucesso</h5>
                            <button type="button" class="close" onclick="fecharModalSucesso()" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Venda efetuada com sucesso.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="fecharModalSucesso()" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function adicionarCliente() {
            // Obter o elemento de input do cliente
            var clienteInput = document.getElementById('clienteInput');

            // Obter a lista de checkboxes
            var checkboxes = document.querySelectorAll('input[name="idCliente"]:checked');

            // Verificar se algum cliente foi selecionado
            if (checkboxes.length > 0) {
                // Obter o nome do primeiro cliente selecionado
                var nomeCliente = checkboxes[0].parentNode.nextElementSibling.textContent;

                // Atualizar o valor do input do cliente
                clienteInput.value = nomeCliente;
            }

            // Fechar o modal
            var modalCliente = document.getElementById('modalCliente');
            var bootstrapModal = bootstrap.Modal.getInstance(modalCliente);
            bootstrapModal.hide();
        }

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
                    '<td>' + 1 + '</td>' +
                    '<td>' + produtoSelecionado.valor_venda + '</td>';
                tbody.appendChild(newRow);
            }

        }

        function calcularValorTotal() {
            var total = 0;
            var tabela = document.querySelector('table');
            var linhas = tabela.getElementsByTagName('tr');

            // Começar a partir da segunda linha para pular o cabeçalho
            for (var i = 1; i < linhas.length; i++) {
                var colunas = linhas[i].getElementsByTagName('td');

                // Acessar o valor venda na terceira coluna (índice 2)
                var valorVenda = parseFloat(colunas[2].textContent.replace('R$ ', ''));

                // Somar o valor venda ao total
                total += valorVenda;
            }

            // Atualizar o valor do input total
            var inputTotal = document.getElementById('valor_total');
            inputTotal.value = 'R$ ' + total.toFixed(2);
        }
        // Função para exibir o modal de sucesso ao clicar no botão "Finalizar"
        function exibirModalSucesso() {
            var modal = document.getElementById('modalSucesso');
            modal.classList.add('show');
            modal.style.display = 'block';
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('modal-open');
            var backdrop = document.createElement('div');
            backdrop.classList.add('modal-backdrop', 'fade', 'show');
            document.body.appendChild(backdrop);
        }

        function fecharModalSucesso() {
            var modal = document.getElementById('modalSucesso');
            modal.classList.remove('show');
            modal.style.display = 'none';
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');
            var backdrop = document.querySelector('.modal-backdrop');
            document.body.removeChild(backdrop);
        }
    </script>
</body>

</html>

@endsection