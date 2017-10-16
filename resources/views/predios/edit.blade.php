@extends('app')

@section('htmlheader_title')
Editar Predio
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Datos Generales del Predio</div>

				<div class="panel-body">
					@include('partials.error')
					{!!Form::open(['route'=>['predios.predios.update', $datosprincipales], 'method'=>'PUT'])!!}

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idTipoInmueble', 'Tipo de Inmueble')!!}
								{!!Form::select('idTipoInmueble', $tinmuebles, $datosprincipales->idTipoInmueble, ['class'=>'form-control', 'required'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('fechaRegistro', 'Fecha')!!}
								{!!Form::date('fechaRegistro', $datosprincipales->fechaRegistro, ['class'=>'form-control', 'required'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('tipoOperacion', 'Tipo de Operacion')!!}
								{!!Form::select('tipoOperacion', ['Renta'=>'Renta', 'Venta'=>'Venta'], $datosprincipales->tipoOperacion, ['class'=>'form-control', 'required'])!!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{!!Form::label('informante', 'Informante')!!}
								{!!Form::text('informante', $datosprincipales->informante, ['class'=>'form-control', 'placeholder'=>'Empresa o Persona', 'required'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('telefono', 'Telefono')!!}
								{!!Form::number('telefono', $datosprincipales->telefono, ['class'=>'form-control', 'placeholder'=>'__-__-__-__-__', 'required'])!!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{!!Form::label('linkWeb', 'Link Web')!!}
								{!!Form::text('linkWeb', $datosprincipales->linkWeb,['class'=>'form-control', 'placeholder'=>'link de venta o informacion'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('valorOperacion', 'Valor de Operacion')!!}
								{!!Form::number('valorOperacion', $datosprincipales->valorOperacion, ['class'=>'form-control', 'placeholder'=>'Valor de la Operacion', 'required'])!!}
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
</div>
@endsection

