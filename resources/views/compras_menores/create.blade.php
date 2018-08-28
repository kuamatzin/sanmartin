@extends('app')
@section ('content')
    <div id="app">
        <a href="/compras_menores">
            <button class="btn btn-success">Regresar</button>
        </a>
        <br><br>
        <crear-compra-menor :dependencias="{{$dependencias}}"></crear-compra-menor>
    </div>
@endsection