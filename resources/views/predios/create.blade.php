@extends('app')

@section('htmlheader_title')
    Nuevo Predio
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Predio</div>

				<div class="panel-body">

					<a href="#">Terreno</a>
					<br><a href="#">Casa Habitación</a>
					<br><a href="#">Local o Edificio Comercial</a>
					<br><a href="#">Local o Edificio de Oficina</a>
					<br><a href="#">Bodega o Nave Comercial</a>
					<br><a href="#">Terreno Agropecuario</a>
					<br>
					<br>
					<br>

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

