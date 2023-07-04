@extends('templates.template')
@section('content')

    <h1 class="text-center">Usuários</h1> <hr>

    <div class="text-md-center mt-3 m-4">
        <a href="{{url('usuarios/cadastrar')}}">
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
            @foreach($listarTodosUsuarios as $users)
                @php
                    $users->find($users->id);
                @endphp
                <tr>
                    <th scope="row">{{$users->id}}</th>
                    <td> {{$users->name}}</td>
                    <td> {{$users->email}}</td>
                    <td>
                        <a href="{{url("usuarios/$users->id/editar")}}">
                            <button class="btn btn-primary">Editar</button>
                            <a/>
                            <a href="{{url("usuarios/$users->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                                <a/>
                    </td>
                </tr>


            @endforeach


            </tbody>

        </table>

    </div>


@endsection
