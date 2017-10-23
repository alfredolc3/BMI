@extends('app')

@section('htmlheader_title')
Nuevo Predio
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Carasteristicas de Predio</div>

				<div class="panel-body">
					@include('partials.error')
					{!!Form::open(['route'=>'datos.caracteristicas.update', 'method'=>'PUT'])!!}

					{!! Form::hidden('idDatosPrincipales', $idDatosPrincipales) !!}

					<div class="d-inline-block bg-primary"><h3><B>CARACTERISTICAS GENERALES Y DE UBICACION</B></h3></div>
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idUbicacionManzana', 'Ubicacion dentro de la Manzana')!!}
								{!!Form::select('idUbicacionManzana', $ubicacionManzana, $caracteristicas->idUbicacionManzana, ['class'=>'form-control', 'placeholder' => 'Seleccione ubicacion de manzana...', 'required'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idTipoVialidad', 'Tipo de Vialidad Colidante')!!}
								{!!Form::select('idTipoVialidad', $tipoVialidad, $caracteristicas->idTipoVialidad, ['class'=>'form-control', 'placeholder' => 'Seleccione tipo de vialidad...', 'required'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('proximidadUrbana', 'Proximidad Urbana')!!}
								{!!Form::select('proximidadUrbana', ['1'=>'1 Km', '2'=>'2 Km', '3'=>'3 Km', '4'=>'4 Km', '5'=>'5 Km', '10'=>'10 Km',], $caracteristicas->proximidadUrbana, ['class'=>'form-control', 'placeholder' => 'Seleccione Proximidad Urbana...', 'required'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idClasificacionZona', 'Clasficacion de la Zona')!!}
								{!!Form::select('idClasificacionZona', $zona, $caracteristicas->idClasificacionZona, ['class'=>'form-control', 'placeholder' => 'Seleccione Clasificacion de la zona...', 'required'])!!}
							</div>
						</div>
					</div>


					<div class="d-inline-block bg-primary"><h3><B>CARACTERISTICAS FISICAS DEL TERRENO</B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idTopografia', 'Topografia')!!}
								{!!Form::select('idTopografia', $topografia, $caracteristicas->idTopografia, ['class'=>'form-control', 'placeholder' => 'Seleccione topografia...', 'required'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idForma', 'Forma')!!}
								{!!Form::select('idForma', $forma, $caracteristicas->idForma, ['class'=>'form-control', 'placeholder' => 'Seleccione Forma del Predio...', 'required'])!!}
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idFrente', 'Frente')!!}
								{!!Form::select('idFrente', $frente, $caracteristicas->idFrente, ['class'=>'form-control', 'placeholder' => 'Seleccione el Frente del Predio...', 'required'])!!}
							</div>
						</div>	
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('vistasPanoramicas', 'Vistas Panoramicas')!!}
								{!!Form::select('vistasPanoramicas', ['Si'=>'Si', 'No'=>'No'], $caracteristicas->vistasPanoramicas, ['class'=>'form-control', 'placeholder' => 'Seleccione vistas panoramicas...', 'required'])!!}
							</div>
						</div>	
						<div class="col-md-8">
							<div class="form-group">
								{!! Form::label('servicios','Servicios')!!}
								{!! Form::select('servicios[]', $servicios, $mis_Servicios, ['class' => 'form-control select-servicio', 'multiple', 'required'])!!}
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