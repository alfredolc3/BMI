@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Tipo de Inmueble {{$tipoInmueble->tipoInmueble}}</div>
					<div class="panel-body">
						{!!Form::open(['route'=>['admin.tipologiasinmueble.update', $tipoInmueble], 'method'=>'PUT'])!!}

						<div class="form-group">
							{!!Form::label('tipoInmueble', 'Tipo de Inmueble')!!}
							{!!Form::text('tipoInmueble', $tipoInmueble->tipoInmueble, ['class'=>'form-control', 'placeholder'=>'Tipo de Inmueble', 'required'])!!}
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