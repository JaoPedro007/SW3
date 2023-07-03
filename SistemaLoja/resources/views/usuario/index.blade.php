@extends('templates.template')

@section('content')

    <h1 class="text-center">Usuários</h1> <hr>

    <div class="text-md-center mt-3 m-4">
        <a href="{{url('usuarios/registrar')}}">
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
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
            </tr>

            </thead>
            <tbody>
            @foreach($listarTodosUsuarios as $usuario)
                @php
                    $usuario->find($usuario->id);
                @endphp
                <tr>
                    <th scope="row">{{$usuario->id}}</th>
                    <td> {{$usuario->name}}</td>
                    <td> {{$usuario->email}}</td>
                    <td>
                        <a href="{{url("usuarios/$usuario->id/editar")}}">
                            <button class="btn btn-primary">Editar</button>
                            <a/>
                            <a href="{{url("usuarios/$usuario->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                                <a/>
                    </td>
                </tr>


            @endforeach


            </tbody>

        </table>

    </div>



@endsection
