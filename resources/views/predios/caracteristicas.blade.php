@extends('app')

@section('htmlheader_title')
Nuevo Predio
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Carasteristicas de Predio</div>

				<div class="panel-body">
					@include('partials.error')
					{!!Form::open(['route'=>'predios.caracteristicas.store', 'method'=>'POST'])!!}


					<div class="d-inline-block bg-primary"><h3><B>CARACTERISTICAS GENERALES Y DE UBICACION</B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('UsoSuelo', 'Uso de Suelo')!!}
								{!!Form::select('UsoSuelo', $usoSuelo, null, ['class'=>'form-control', 'placeholder' => 'Seleccione uso de suelo...', 'required'])!!}
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('UbicacionManzana', 'Ubicacion dentro de la Manzana')!!}
								{!!Form::select('UbicacionManzana', $ubicacionManzana, null, ['class'=>'form-control', 'placeholder' => 'Seleccione ubicacion de manzana...', 'required'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('TipoVialidad', 'Tipo de Vialidad Colidante')!!}
								{!!Form::select('TipoVialidad', $tipoVialidad, null, ['class'=>'form-control', 'placeholder' => 'Seleccione tipo de vialidad...', 'required'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('proximidadUrbana', 'Proximidad Urbana')!!}
								{!!Form::select('proximidadUrbana', ['1'=>'1 Km', '2'=>'2 Km', '3'=>'3 Km', '4'=>'4 Km', '5'=>'5 Km', '10'=>'10 Km',], null, ['class'=>'form-control', 'placeholder' => 'Seleccione Proximidad Urbana...', 'required'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('ClasificacionZona', 'Clasficacion de la Zona')!!}
								{!!Form::select('ClasificacionZona', $zona, null, ['class'=>'form-control', 'placeholder' => 'Seleccione Clasificacion de la zona...', 'required'])!!}
							</div>
						</div>
					</div>


					<div class="d-inline-block bg-primary"><h3><B>CARACTERISTICAS FISICAS DEL TERRENO</B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('Topografia', 'Topografia')!!}
								{!!Form::select('Topografia', $topografia, null, ['class'=>'form-control', 'placeholder' => 'Seleccione topografia...', 'required'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('Forma', 'Forma')!!}
								{!!Form::select('Forma', $forma, null, ['class'=>'form-control', 'placeholder' => 'Seleccione Forma del Predio...', 'required'])!!}
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('Frente', 'Frente')!!}
								{!!Form::select('Frente', $frente, null, ['class'=>'form-control', 'placeholder' => 'Seleccione el Frente del Predio...', 'required'])!!}
							</div>
						</div>	
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('vistasPanoramicas', 'Vistas Panoramicas')!!}
								{!!Form::select('vistasPanoramicas', ['Renta'=>'Renta', 'Venta'=>'Venta'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione vistas panoramicas...', 'required'])!!}
							</div>
						</div>	
						<div class="col-md-8">
							<div class="form-group">
								{!! Form::label('servicios','Servicios')!!}
								{!! Form::select('servicios[]', $servicios, null, ['class' => 'form-control select-servicio', 'multiple', 'required'])!!}
							</div>
						</div>													
					</div>
					<div class="form-group">
						{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
					</div>	
					{!!Form::close()!!}	
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