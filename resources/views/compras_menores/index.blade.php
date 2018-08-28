@extends('app')
@section ('content')
    <div class="card card-default">
        <div class="card-header">
            <h1>Listado de compras menores</h1>
        </div>
        <div class="card-body">
            <a href="/compras_menores/create">
                <button class="btn btn-success">
                    Registrar compra menor
                </button>
            </a>
            <br><br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Dependencia</th>
                    <th scope="col">Folio</th>
                    <th scope="col">Ver</th>
                    @if(!Auth::user()->isAnalista())
                    <th scope="col">Cantidades Aprovadas</th>
                    <th scope="col">Cotizar</th>
                    <th scope="col">Seleccionar Proveedores</th>
                    <th scope="col">Generar archivo</th>
                    @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($compras_menores as $key => $compra)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <th>{{$compra->dependencia->nombre}}</th>
                        <td>{{$compra->folio}}</td>
                        <td>
                            <a href="/compras_menores/show/{{$compra->id}}">
                                <button class="btn btn-primary">
                                    Ver
                                </button>
                            </a>
                        </td>
                        @if(!Auth::user()->isAnalista())
                        <td>
                            <a href="/compras_menores/{{$compra->id}}/cantidades_autorizadas">
                                <button class="btn btn-secondary">
                                    Cantidades Aprovadas
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="/compras_menores/cotizar/{{$compra->id}}">
                                <button class="btn btn-info">
                                    Cotizar
                                </button>
                            </a>
                        </td>  
                        <td>
                            <a href="/compras_menores/seleccionar_proveedores/{{$compra->id}}">
                                <button class="btn btn-warning">
                                    Seleccionar Proveedores
                                </button>
                            </a>
                        </td> 
                        <td>
                            <a href="/compras_menores/descargar_archivo/{{$compra->id}}">
                                <button class="btn btn-success">
                                    Descargar archivo
                                </button>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection