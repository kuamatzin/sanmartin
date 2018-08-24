@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-default">
				<div class="card-header">
					<h1>Crear requisicion</h1>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => 'requisiciones']) !!}
				    	@include('requisiciones.form_2017', ['submitButtonText' => 'Crear Requisicion'])
				    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
 <script>
$('#regularizar').click(function () {
    $('#reg').toggle(this.checked);
});
 </script>
@endsection