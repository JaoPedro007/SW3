@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastrar</h1> <hr>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('usuarios/salvar')}}">
            @csrf
            <input class="form-control" type="text" name="name" id="name" placeholder="Nome:"><br>
            <input class="form-control" type="text" name="email" id="email" placeholder="Email:"><br>
            <input class="form-control" type="password" name="password" id="password" placeholder="Senha:"><br>


            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection
