@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Asentamiento</div>
					<div class="panel-body">
						@include('partials.error')
						{!!Form::open(['route'=>'admin.sepomex.update', 'method'=>'PUT'])!!}

						<div class="form-group">
							{!!Form::label('estado', 'Estado')!!}
							{!!Form::select('estado', $estados, $sepomex->estado, ['class'=>'form-control', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('municipio', 'Municipio')!!}
							{!!Form::text('municipio', $sepomex->municipio,['class'=>'form-control', 'placeholder'=>'Municipio', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('ciudad', 'Ciudad')!!}
							{!!Form::text('ciudad', $sepomex->ciudad,['class'=>'form-control', 'placeholder'=>'Ciudad', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('tzona', 'Tipo de Zona')!!}
							{!!Form::select('tzona', ['Urbano'=>'Urbano', 'Rural'=>'Rustico'], $sepomex->tipoZona, ['class'=>'form-control', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('cp', 'Codigo Postal')!!}
							{!!Form::number('cp', $sepomex->cp,['class'=>'form-control', 'placeholder'=>'Codigo Postal', 'required'])!!}
						</div>
						
						<div class="form-group">
							{!!Form::label('tasentamiento', 'Tipo de Asentamiento')!!}
							{!!Form::select('tasentamiento', $tiposasentamientos, $sepomex->tipoAsentamiento, ['class'=>'form-control', 'required'])!!}
						</div>


						<div class="form-group">
							{!!Form::label('asentamiento', 'Asentamiento')!!}
							{!!Form::text('asentamiento', $sepomex->asentamiento,['class'=>'form-control', 'placeholder'=>'Asentamiento', 'required'])!!}
						</div>
						<div class="form-group">
							{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
						</div>	


						{!!Form::close()!!}
					</div>					
				</div>				
			</div>
		</div>
	</div>	
@endsection