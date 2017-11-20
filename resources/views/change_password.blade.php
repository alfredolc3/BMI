@extends('app')

@section('htmlheader_title')
Nuevo Predio
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Cambio de Contraseña</div>

				<div class="panel-body">
					@include('partials.error')

					{!!Form::open(['route'=>'password.change.store', 'method'=>'POST'])!!}

					{!! Form::hidden('id', Auth::user()->id) !!}
					
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									{!!Form::label('old_password', 'Contraseña actual')!!}
									{!!Form::password('old_password', ['class'=>'form-control']) !!}
									
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									{!!Form::label('password', 'Nueva Contraseña')!!}
									{!!Form::password('password', ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-grouppassword_confirmation">
									{!!Form::label('password_confirmation', 'Confirmar Nueva Contraseña')!!}
									{!!Form::password('password_confirmation', ['class'=>'form-control']) !!}
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

