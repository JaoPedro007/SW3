@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastrar</h1> <hr>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('produtos/salvar')}}">
            @csrf
            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição"><br>
            <input class="form-control" type="text" name="quantidade" id="quantidade" placeholder="Quantidade:"><br>
            <input class="form-control" type="text" name="valorCusto" id="valorCusto" placeholder="Valor Custo:"><br>
            <input class="form-control" type="text" name="valorVenda" id="valorVenda" placeholder="Valor Venda:"><br>

            <select class="form-control" name="id_departamento" id="id_departamento">
                <option value="">Departamento</option>
                @foreach($departamentos as $findDepartamento)
                    <option value="{{$findDepartamento->id}}">{{$findDepartamento->nome}}</option>
                @endforeach
            </select><br>
            <select class="form-control" name="id_marca" id="id_marca">
                <option value="">Marca</option>
                @foreach($marcas as $findMarca)
                    <option value="{{$findMarca->id}}">{{$findMarca->nome}}</option>
                @endforeach
            </select><br>


            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection
