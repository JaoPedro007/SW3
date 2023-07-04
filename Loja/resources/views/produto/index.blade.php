@extends('templates.template')

@section('content')

    <h1 class="text-center">Produtos</h1>
    <hr>

    <div class="text-md-center mt-3 m-4">
        <a href="{{url('produtos/cadastrar')}}">
            <button class="btn btn-success">Cadastrar</button>
            <a/>
    </div>
    <div class="col-8 m-auto">
        @csrf
        <table class="table table-striped">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor Custo</th>
                <th scope="col">Valor Venda</th>
                <th scope="col">Departamento</th>
                <th scope="col">Marca</th>
                <th scope="col">Ações</th>

            </tr>

            </thead>
            <tbody>
            @foreach($listarTodosProdutos as $produto)
                @php
                    $produto->find($produto->id);
                    $departamento=$produto->find($produto->id)->relDepart;
                    $marca=$produto->find($produto->id)->relMarc;

                @endphp
                <tr>
                    <th scope="row">{{$produto->id}}</th>
                    <td> {{$produto->descricao}}</td>
                    <td> {{$produto->quantidade}}</td>
                    <td> {{$produto->valorCusto}}</td>
                    <td> {{$produto->valorVenda}}</td>
                    <td> {{$departamento->nome}}</td>
                    <td> {{$marca->nome}}</td>
                    <td>
                        <a href="{{url("produtos/$produto->id/editar")}}">
                            <button class="btn btn-primary">Editar</button>
                            <a/>
                            <a href="{{url("produtos/$produto->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                                <a/>
                    </td>
                </tr>

            @endforeach


            </tbody>

        </table>

    </div>



@endsection
