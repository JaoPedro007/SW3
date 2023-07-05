@extends('templates.template')
@section('content')

    <html>
    <head></head>
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

    <?php


    $total = 0;

//foreach ($produtos as $produto) {
//    $total += $produto[2];
//}

    ?>
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

                </tbody>

            </table>
            <!--Totalizadores e nome do cliente-->
            <div id='input-total' class="input-group mb-3">
                <input type="string" placeholder="Cliente: " style="width: 20em">
                <input type="int" value='<?php echo $total; ?>' placeholder="Total:"
                       style="width: 7em; margin-left:10px" readonly>
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
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor venda</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($listarProdutosModal as $produto): ?>
                                <tr>
                                    <td><?php echo $produto->descricao; ?></td>
                                    <td>1</td>
                                    <td>R$ <?php echo $produto->valorVenda; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="modal-footer">


                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary">Adicionar</button>
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
                                <?php foreach ($listarClientesModal as $cliente): ?>
                                <tr>
                                    <td><?php echo $cliente->nome; ?></td>
                                    <td><?php echo $cliente->cpfCnpj; ?></td>
                                    <td><?php echo $cliente->cidade . " " . $cliente->estado; ?></td>
                                </tr>
                                <?php endforeach; ?>
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

    </body>

    </html>

@endsection
