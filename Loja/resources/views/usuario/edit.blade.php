@extends('templates.template')

@section('content')
    <h1 class="text-center"> Salvar </h1>
    <hr>

    <div class="col-8 m-auto">

        <form name="formEdit" id="formEdit" method="post" action="{{url("usuarios/$user->id/salvar")}}">
            @method('PUT')

            @csrf
            <input class="form-control" type="text" name="name" id="name" placeholder="Nome:"
                   value="{{$user->name ?? ''}}" required><br>

            <input class="form-control" type="text" name="email" id="email" placeholder="Email:"
                   value="{{$user->email ?? ''}}" required><br>

            <input class="form-control" type="password" name="password" id="password" placeholder="Senha:"
                   value="{{$user->password ?? ''}}" required><br>

            <input class="btn btn-success" type="submit" value="Salvar">
        </form>
    </div>
@endsection
