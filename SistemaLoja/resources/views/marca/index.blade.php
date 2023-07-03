@extends('templates.template')

@section('content')

    <h1 class="text-center">Marcas</h1>
    <hr>

    <div class="text-md-center mt-3 m-4">
        <a href="{{url('marcas/cadastrar')}}">
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
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>

            </tr>

            </thead>
            <tbody>
            @foreach($listarTodasMarcas as $marca)
                @php
                    $marca->find($marca->id);
                @endphp
                <tr>
                    <th scope="row">{{$marca->id}}</th>
                    <td> {{$marca->nome}}</td>
                    <td> {{$marca->descricao}}</td>
                    <td>
                        <a href="{{url("marcas/$marca->id/editar")}}">
                            <button class="btn btn-primary">Editar</button>
                            <a/>
                            <a href="{{url("marcas/$marca->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                                <a/>
                    </td>
                </tr>

            @endforeach


            </tbody>

        </table>

    </div>

@endsection
