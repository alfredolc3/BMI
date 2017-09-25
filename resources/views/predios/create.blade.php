@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">


					<div class="form-group">
						{!! Form::label('servicios','Servicios')!!}
						{!! Form::select('servicios[]', $servicios, null, ['class' => 'form-control select-servicio', 'multiple', 'required'])!!}
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
	$('.select-servicio').chosen({
		placeholder_text_multiple: 'Seleccione los servicios que tiene el predio',
		no_results_text: 'No se encontro el servicio'
	//	search_contains: true
	})
	</script>
@endsection

