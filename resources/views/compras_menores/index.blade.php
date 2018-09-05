@extends('app')
@section ('content')
    <div class="card card-default" id="app">
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
                        <th scope="col">Cantidades Aprobadas</th>
                        <th scope="col">Cotizar</th>
                        <th scope="col">Seleccionar Proveedores</th>
                        <th scope="col">Generar archivo</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compras_menores as $key => $compra)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <th>{{$compra->dependencia->nombre}}</th>
                        <td>{{$compra->id}}</td>
                        <td>
                            <a href="/compras_menores/show/{{$compra->id}}">
                                <button class="btn btn-primary">
                                    Ver
                                </button>
                            </a>
                        </td>
                        <td>
                            <a @if(Auth::user()->isAnalista() == false) href="/compras_menores/{{$compra->id}}/cantidades_autorizadas" @endif>
                                <button class="btn btn-secondary @if(Auth::user()->isAnalista()) disabled @endif">
                                    Cantidades Aprobadas
                                </button>
                            </a>
                        </td>
                        <td>
                            <a @if(Auth::user()->isAnalista() == false) href="/compras_menores/cotizar/{{$compra->id}}" @endif>
                                <button class="btn btn-info @if(Auth::user()->isAnalista()) disabled @endif">
                                    Cotizar
                                </button>
                            </a>
                        </td>  
                        <td>
                            <a @if(Auth::user()->isAnalista() == false) href="/compras_menores/seleccionar_proveedores/{{$compra->id}}" @endif>
                                <button class="btn btn-warning @if(Auth::user()->isAnalista()) disabled @endif">
                                    Seleccionar Proveedores
                                </button>
                            </a>
                        </td> 
                        <td>
                            <a @if(Auth::user()->isAnalista() == false) href="/compras_menores/descargar_archivo/{{$compra->id}}" @endif>
                                <button class="btn btn-success @if(Auth::user()->isAnalista()) disabled @endif">
                                    Descargar archivo
                                </button>
                            </a>
                        </td>
                        <td>
                            @if(Auth::user()->isAnalista() == false)
                            <eliminar-compra :compra_id="{{$compra->id}}"></eliminar-compra>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection