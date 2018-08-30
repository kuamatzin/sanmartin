@extends('app')
@section ('content')
    <a href="/compras_menores">
        <button class="btn btn-success">Regresar</button>
    </a>
    <br><br>
    <div class="card">
        <div class="card-header">
            <h1>Compra Folio: {{$compra->id}}</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad Solicitada</th>
                        <th scope="col">Cantidad Autorizada</th>
                    </tr>
                </thead>
                {!! Form::open(['url' => '/compras_menores/' . $compra->id . '/cantidades_autorizadas']) !!}
                <tbody>
                    @foreach($compra->partidas as $key => $partida)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$partida->descripcion}}</td>
                        <td>{{$partida->cantidad_solicitada}}</td>
                        <td>
                            <input type="text" class="form-control" name="cantidad[]" value="{{$partida->cantidad_autorizada}}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Guardar</button>
            {!! Form::close() !!}

            @if(isset($success))
            <div class="alert alert-success mt-5" role="alert">
                Cantidades guardadas exitosamente
            </div>
            @endif
        </div>
    </div>
@endsection