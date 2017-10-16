@extends('app')

@section('htmlheader_title')
    Nuevo Predio
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Datos Generales</div>

				<div class="panel-body">
					@include('partials.error')
						{!!Form::open()!!}

						<div class="form-group">
							{!!Form::label('imagen1', 'Imagen 1')!!}
							{!!Form::file('imagen1')!!}
						</div>

						<div class="form-group">
							{!!Form::label('imagen2', 'Imagen 2')!!}
							{!!Form::file('imagen2')!!}
						</div>

						<div class="form-group">
							{!!Form::label('imagen3', 'Imagen 3')!!}
							{!!Form::file('imagen3')!!}
						</div>

						<div class="form-group">
							{!!Form::label('imagen4', 'Imagen 4')!!}
							{!!Form::file('imagen4')!!}
						</div>
						
						<div class="form-group">
							{!!Form::label('imagen5', 'Imagen 5')!!}
							{!!Form::file('imagen5')!!}
						</div>

						<div class="form-group">
							{!!Form::label('imagen6', 'Imagen 6')!!}
							{!!Form::file('imagen6')!!}
						</div>

						<div class="form-group">
							{!!Form::label('observaciones', 'Observaciones')!!}
							{!!Form::textarea('observaciones', null, ['class'=> 'form-control'])!!}
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