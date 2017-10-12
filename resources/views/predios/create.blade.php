@extends('app')

@section('htmlheader_title')
Nuevo Predio
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Datos Generales del Nuevo Predio</div>

				<div class="panel-body">
					@include('partials.error')
					{!!Form::open(['route'=>'predios.predios.store', 'method'=>'POST'])!!}


					
					
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idTipoInmueble', 'Tipo de Inmueble')!!}
								{!!Form::select('idTipoInmueble', $tinmuebles, null, ['class'=>'form-control', 'placeholder' => 'Seleccione una opcion...', 'required'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('fechaRegistro', 'Fecha')!!}
								{!!Form::date('fechaRegistro', null, ['class'=>'form-control', 'required'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('tipoOperacion', 'Tipo de Operacion')!!}
								{!!Form::select('tipoOperacion', ['Renta'=>'Renta', 'Venta'=>'Venta'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione una opcion...', 'required'])!!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{!!Form::label('informante', 'Informante')!!}
								{!!Form::text('informante', null,['class'=>'form-control', 'placeholder'=>'Empresa o Persona', 'required'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('telefono', 'Telefono')!!}
								{!!Form::number('telefono', null,['class'=>'form-control', 'placeholder'=>'__-__-__-__-__', 'required'])!!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{!!Form::label('linkWeb', 'Link Web')!!}
								{!!Form::text('linkWeb', null,['class'=>'form-control', 'placeholder'=>'link de venta o informacion'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('valorOperacion', 'Valor de Operacion')!!}
								{!!Form::number('valorOperacion', null,['class'=>'form-control', 'placeholder'=>'Valor de la Operacion', 'required'])!!}
							</div>
						</div>

					</div>
						<div class="form-group">
							{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
						</div>	


					{!!Form::close()!!}	
					
				</div>

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

