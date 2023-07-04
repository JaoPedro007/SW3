@extends('templates.template')
@section('content')



<style>
    #btn-produto, #btn-cliente, #btn-pagamento, #btn-finalizar{
        margin-left:1%;
        margin-top:5%
    }
    #btn-produto{
        background-color:#5C4033;
        
    }
    #btn-pagamento{
        background-color:#48c928;

    }
    #input-total{
        margin-top:5%;
        margin-left:72%;
    }
</style>

<h1 class="text-center">PDV</h1> <hr>

<?php

$produtos = [
    ["Nome do Produto 1", "Descrição do Produto 1", 12.99],
    ["Nome do Produto 2", "Descrição do Produto 2", 15.99],
    ["Nome do Produto 3", "Descrição do Produto 3", 10.99],
    ["Nome do Produto 3", "Descrição do Produto 3", 10.99],

    // Adicione quantos produtos desejar...
];

$total = 0;

foreach ($produtos as $produto) {
    $total += $produto[2];
}

?>
<div class="col-8 m-auto">
    <form name="formCad" id="formCad" method="post" action="{{url('vendas/finalizar')}}">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Descricao</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Valor venda</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto[0]; ?></td>
                <td><?php echo $produto[1]; ?></td>
                <td><?php echo $produto[2]; ?></td>
            </tr>
        <?php endforeach; ?>
  </tbody>
</table>
        <div id='input-total'class="input-group mb-3">
             <input type="string" placeholder="Cliente: "style="width: 20em">
             <input type="int" value='<?php echo $total; ?>'placeholder="Total:" style="width: 7em; margin-left:10px" readonly>
        </div>


        <div class="input-group mb-3">
             <button id="btn-produto" type="button" class="btn btn-secondary">Produto</button>
             <button id="btn-cliente" type="button" class="btn btn-primary">Cliente</button>
             <button id='btn-pagamento' type="button" class="btn btn-info">Pagamento</button>
             <button id='btn-finalizar' class="btn btn-success" type="submit">Finalizar</button>

        </div>


    </form>
</div>




@endsection
