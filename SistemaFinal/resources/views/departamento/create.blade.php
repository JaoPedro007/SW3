@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastrar</h1> <hr>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('departamentos/salvar')}}">
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome:"><br>
            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição:"><br>

            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection
