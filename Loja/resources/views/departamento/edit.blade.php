@extends('templates.template')

@section('content')
    <h1 class="text-center"> Salvar </h1>
    <hr>

    <div class="col-8 m-auto">

        <form name="formEdit" id="formEdit" method="post" action="{{url("departamentos/$departamento->id/salvar")}}">
            @method('PUT')

            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome:"
                   value="{{$departamento->nome ?? ''}}" required><br>

            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição:"
                   value="{{$departamento->descricao ?? ''}}" required><br>

            <input class="btn btn-success" type="submit" value="Salvar">
        </form>
    </div>
@endsection
