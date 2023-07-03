@extends('templates.template')

@section('content')

    <h1 class="text-center">Clientes</h1>
    <hr>

    <div class="text-md-center mt-3 m-4">
        <a href="{{url('clientes/cadastrar')}}">
            <button class="btn btn-success">Cadastrar</button>
            <a/>
    </div>
    <div class="col-8 m-auto">
        @csrf
        <table class="table table-striped">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF/CNPJ</th>
                <th scope="col">Estado</th>
                <th scope="col">Cidade</th>
                <th scope="col">Bairro</th>
                <th scope="col">Rua</th>
                <th scope="col">Número</th>
                <th scope="col">Cep</th>
                <th scope="col">Ações</th>

            </tr>

            </thead>
            <tbody>
            @foreach($listarTodosClientes as $cliente)
                @php
                    $cliente->find($cliente->id);
                @endphp
                <tr>
                    <th scope="row">{{$cliente->id}}</th>
                    <td> {{$cliente->nome}}</td>
                    <td> {{$cliente->cpfCnpj}}</td>
                    <td> {{$cliente->estado}}</td>
                    <td> {{$cliente->cidade}}</td>
                    <td> {{$cliente->bairro}}</td>
                    <td> {{$cliente->rua}}</td>
                    <td> {{$cliente->numero}}</td>
                    <td> {{$cliente->cep}}</td>
                    <td>
                        <a href="{{url("clientes/$cliente->id/editar")}}">
                            <button class="btn btn-primary">Editar</button>
                            <a/>
                            <a href="{{url("clientes/$cliente->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                                <a/>
                    </td>
                </tr>

            @endforeach


            </tbody>

        </table>

    </div>



@endsection
