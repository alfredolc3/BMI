@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Frente {{$frente->frente}}</div>
					<div class="panel-body">
						{!!Form::open(['route'=>['admin.frentes.update', $frente], 'method'=>'PuT'])!!}

						<div class="form-group">
							{!!Form::label('frente', 'Frente de Predio')!!}
							{!!Form::text('frente', $frente->frente,['class'=>'form-control', 'placeholder'=>'Frente de Predio', 'required'])!!}
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