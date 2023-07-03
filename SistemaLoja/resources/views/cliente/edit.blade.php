@extends('templates.template')

@section('content')
    <h1 class="text-center"> Editar </h1>
    <hr>

    <div class="col-8 m-auto">

        <form name="formEdit" id="formEdit" method="post" action="{{url("clientes/$clientes->id/salvar")}}">
            @method('PUT')

            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome:"
                   value="{{$clientes->nome ?? ''}}" required><br>
            <input class="form-control" type="text" name="cpfCnpj" id="cpfCnpj" placeholder="CPF/CNPJ:"
                   value="{{$clientes->cpfCnpj ?? ''}}" required><br>
            <input class="form-control" type="text" name="estado" id="estao" placeholder="Estado:"
                   value="{{$clientes->estado ?? ''}}" required><br>
            <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade:"
                   value="{{$clientes->cidade ?? ''}}" required><br>
            <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro:"
                   value="{{$clientes->bairro ?? ''}}" required><br>
            <input class="form-control" type="text" name="rua" id="rua" placeholder="Rua:"
                   value="{{$clientes->rua ?? ''}}" required><br>
            <input class="form-control" type="text" name="numero" id="numero" placeholder="Número:"
                   value="{{$clientes->numero ?? ''}}" required><br>
            <input class="form-control" type="text" name="cep" id="cep" placeholder="Cep:"
                   value="{{$clientes->cep ?? ''}}" required><br>

            <input class="btn btn-success" type="submit" value="Salvar">
        </form>
    </div>
@endsection
