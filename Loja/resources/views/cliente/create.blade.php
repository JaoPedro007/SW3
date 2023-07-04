@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastrar</h1> <hr>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('clientes/salvar')}}">
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome: "><br>
            <input class="form-control" type="text" name="cpfCnpj" id="cpfCnpj" placeholder="CPF/CNPJ: "><br>
            <input class="form-control" type="text" name="estado" id="estado" placeholder="Estado: "><br>
            <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade: "><br>
            <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro: "><br>
            <input class="form-control" type="text" name="rua" id="rua" placeholder="Rua: "><br>
            <input class="form-control" type="text" name="numero" id="numero" placeholder="Número: "><br>
            <input class="form-control" type="text" name="cep" id="cep" placeholder="Cep: "><br>


            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection
