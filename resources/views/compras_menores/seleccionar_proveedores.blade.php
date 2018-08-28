@extends('app')

@section('content')
    <a href="/compras_menores">
        <button class="btn btn-success">Regresar</button>
    </a>
    <br><br>
    <div class="card">
        <div class="card-header">
            <h1>Seleccionar Proveedores Adjudicados</h1>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => '/compras_menores/seleccionar_proveedores/' . $compra->id]) !!}
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Selección</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">RFC</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compra->proveedores_cotizando as $key => $proveedor)
                    <tr>
                        <td>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="seleccionados[]" value="{{$proveedor->proveedor->id}}" @if($proveedor->seleccionado) checked @endif>
                                <label class="form-check-label" for="exampleCheck1">Seleccionar</label>
                            </div>
                        </td>
                        <th scope="row">
                            {{$key + 1}}
                        </th>
                        <td>{{$proveedor->proveedor->nombre}}</td>
                        <td>{{$proveedor->proveedor->rfc}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Guardar proveedores</button>
            {!! Form::close() !!}

            @if ($errors->any())
            <div class="alert alert-danger mt-5">
                Solo puede seleccionar 2 proveedores
            </div>
            @endif

            @if(isset($updated))
            <div class="alert alert-success mt-5" role="alert">
                Datos guardados exitosamente
            </div>
            @endif
        </div>
    </div>
@endsection