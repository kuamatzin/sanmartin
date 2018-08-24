@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card card-default">
				<div class="card-header">
					<h1>Registrar usuario</h1>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => 'usuarios']) !!}
						@include('usuarios.form', ['submitButtonText' => 'Crear Usuario'])
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
