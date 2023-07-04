@extends('templates.template')

@section('content')

    <h1 class="text-center">Departamentos</h1> <hr>

    <div class="text-md-center mt-3 m-4">
        <a href="{{url('departamentos/cadastrar')}}">
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
            @foreach($listarTodosDepartamentos as $departamento)
                @php
                    $departamento->find($departamento->id);
                @endphp
                <tr>
                    <th scope="row">{{$departamento->id}}</th>
                    <td> {{$departamento->nome}}</td>
                    <td> {{$departamento->descricao}}</td>
                    <td>
                            <a href="{{url("departamentos/$departamento->id/editar")}}">
                                <button class="btn btn-primary">Editar</button>
                                <a/>
                                <a href="{{url("departamentos/$departamento->id")}}" class="js-del">
                                    <button class="btn btn-danger">Deletar</button>
                                    <a/>
                    </td>
                </tr>


            @endforeach


            </tbody>

        </table>

    </div>



@endsection
