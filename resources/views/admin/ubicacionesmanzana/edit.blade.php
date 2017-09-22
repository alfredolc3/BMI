@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar ubicacion de manzanas {{$ubicacionesmanzana->ubicacionManzana}}</div>
					<div class="panel-body">
						{!!Form::open(['route'=>['admin.ubicacionesmanzana.update', $ubicacionesmanzana], 'method'=>'PUT'])!!}

						<div class="form-group">
							{!!Form::label('ubicacionesmanzana', 'Ubicación de Manzana')!!}
							{!!Form::text('ubicacionManzana', $ubicacionesmanzana->ubicacionManzana,['class'=>'form-control', 'placeholder'=>'Ubicación de Manzana', 'required'])!!}
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