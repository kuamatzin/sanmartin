@extends('app')
@section ('content')
    <div id="app">
        <a href="/compras_menores">
            <button class="btn btn-success">Regresar</button>
        </a>
        <br><br>
        <compra-menor :compra_id="{{$compra->id}}" :compra="{{ json_encode($compra) }}" :compra_partidas="{{ json_encode($compra->partidas) }}"></compra-menor>
    </div>
@endsection