@extends('app')
	@section('htmlheader_title')
		Nuevo Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Nuevo Asentamiento</div>
					<div class="panel-body">
						@include('partials.error')
						{!!Form::open(['route'=>'admin.sepomex.store', 'method'=>'POST'])!!}

						<div class="form-group">
							{!!Form::label('estado', 'Estado')!!}
							{!!Form::select('estado', $estados, null, ['class'=>'form-control', 'placeholder' => 'Seleccione una opcion...', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('municipio', 'Municipio')!!}
							{!!Form::text('municipio', null,['class'=>'form-control', 'placeholder'=>'Municipio', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('ciudad', 'Ciudad')!!}
							{!!Form::text('ciudad', null,['class'=>'form-control', 'placeholder'=>'Ciudad', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('tpredio', 'Tipo de Prdio')!!}
							{!!Form::select('tpredio', ['Urbano'=>'Urbano', 'Rural'=>'Rustico'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione una opcion...', 'required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('cp', 'Codigo Postal')!!}
							{!!Form::number('cp', null,['class'=>'form-control', 'placeholder'=>'Codigo Postal', 'required'])!!}
						</div>
						
						<div class="form-group">
							{!!Form::label('tasentamiento', 'Tipo de Asentamiento')!!}
							{!!Form::select('tasentamiento', $tiposasentamientos, null, ['class'=>'form-control', 'placeholder' => 'Seleccione una opcion...', 'required'])!!}
						</div>


						<div class="form-group">
							{!!Form::label('asentamiento', 'Asentamiento')!!}
							{!!Form::text('asentamiento', null,['class'=>'form-control', 'placeholder'=>'Asentamiento', 'required'])!!}
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