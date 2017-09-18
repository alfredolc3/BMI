@extends('app')
	@section('htmlheader_title')
		Nuevo Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Nuevo Uso Suelo</div>
					<div class="panel-body">
						{!!Form::open(['route'=>'admin.usossuelo.store', 'method'=>'POST'])!!}

						<div class="form-group">
							{!!Form::label('usoSuelo', 'Tipo uso suelo')!!}
							{!!Form::text('usoSuelo', null,['class'=>'form-control', 'placeholder'=>'Tipo uso suelo', 'required'])!!}
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