@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Vialidad {{$tiposvialidad->tipoVialidad}}</div>
					<div class="panel-body">
						{!!Form::open(['route'=>['admin.tiposvialidad.update', $tiposvialidad], 'method'=>'PUT'])!!}

						<div class="form-group">
							{!!Form::label('tipoVialidad', 'Forma de Predio')!!}
							{!!Form::text('tipoVialidad', $tiposvialidad->tipoVialidad,['class'=>'form-control', 'placeholder'=>'Tipo de Vialidad', 'required'])!!}
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