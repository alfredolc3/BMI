@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Clasificacion de Zona {{$zona->zona}}</div>
					<div class="panel-body">
						{!!Form::open(['route'=>['admin.zonas.update', $zona], 'method'=>'PUT'])!!}

						<div class="form-group">
							{!!Form::label('forma', 'Clasificacion de Zona')!!}
							{!!Form::text('zona', $zona->zona,['class'=>'form-control', 'placeholder'=>'Clasificacion de Zona', 'required'])!!}
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