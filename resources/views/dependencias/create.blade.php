@extends('app')
@section ('content')
  <div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card card-default">
            <div class="card-header">
                <h1>Crear dependencia</h1>
            </div>
            <div class="card-body">
                {!! Form::open(['url' => 'dependencias']) !!}
                    @include('dependencias.form', ['submitButtonText' => 'Crear Dependencia'])
                  {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>
@endsection
