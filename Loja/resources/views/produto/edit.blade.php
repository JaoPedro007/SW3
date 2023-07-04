@extends('templates.template')

@section('content')
    <h1 class="text-center"> Editar </h1>
    <hr>

    <div class="col-8 m-auto">

        <form name="formEdit" id="formEdit" method="post" action="{{url("produtos/$produto->id/salvar")}}">
            @method('PUT')

            @csrf
            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição:"
                   value="{{$produto->descricao ?? ''}}" required><br>

            <input class="form-control" type="text" name="quantidade" id="quantidade" placeholder="Quantidade:"
                   value="{{$produto->quantidade ?? ''}}" required><br>

            <input class="form-control" type="text" name="valorCusto" id="valorCusto" placeholder="Valor Custo:"
                   value="{{$produto->valorCusto ?? ''}}" required><br>

            <input class="form-control" type="text" name="valorVenda" id="valorVenda" placeholder="Valor Venda:"
                   value="{{$produto->valorVenda ?? ''}}" required><br>


            <select class="form-control" name="id_departamento" id="id_departamento" required>
                <option value="{{$produto->relDepart->id ?? ''}}">{{$produto->relDepart->nome ?? 'Departamento'}}</option>
                @foreach($departamentos as $findDepartamento)
                    <option value="{{$findDepartamento->id}}">{{$findDepartamento->nome}}</option>
                @endforeach
            </select><br>

            <select class="form-control" name="id_marca" id="id_marca" required>
                <option value="{{$produto->relMarc->id ?? ''}}">{{$produto->relMarc->nome ?? 'Marca'}}</option>
                @foreach($marcas as $findMarca)
                    <option value="{{$findMarca->id}}">{{$findMarca->nome}}</option>
                @endforeach
            </select><br>



            <input class="btn btn-success" type="submit" value="Salvar">
        </form>
    </div>
@endsection
