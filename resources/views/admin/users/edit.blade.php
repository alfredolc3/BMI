@extends('app')

@section('htmlheader_title')
    Editar Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Usuario {{$user->name}} </div>
				<div class="panel-body">
					{!!Form::open(['route'=> ['admin.users.update', $user], 'method'=>'PUT'])!!}

					<div class="form-group">
						{!!Form::label('name', 'Nombre')!!}
						{!!Form::text('name', $user->name,['class'=>'form-control', 'placeholder'=>'Nombre Completo', 'required'])!!}
					</div>

					<div class="form-group">
						{!!Form::label('email', 'Correo Electronico')!!}
						{!!Form::email('email', $user->email,['class'=>'form-control', 'placeholder'=>'example@gmail.com', 'required'])!!}
					</div>

					<div class="form-group">
						{!!Form::label('type', 'Tipo')!!}
						{!!Form::select('type', [''=>'Seleccione tipo de usuario', 'Normal'=>'Normal', 'Administrador'=>'Administrador'], null, ['class'=>'form-control',])!!}
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
