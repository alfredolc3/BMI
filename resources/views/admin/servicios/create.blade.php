@extends('app')
	@section('htmlheader_title')
		Nuevo Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Nuevo Servicio</div>
					<div class="panel-body">
						@include('partials.error')
						{!!Form::open(['route'=>'admin.servicios.store', 'method'=>'POST'])!!}

						<div class="form-group">
							{!!Form::label('servicio', 'Servicio')!!}
							{!!Form::text('servicio', null,['class'=>'form-control', 'placeholder'=>'Servicio', 'required'])!!}
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