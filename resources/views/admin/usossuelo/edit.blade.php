@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Uso de Suelo {{$usossuelo->usoSuelo}}</div>
					<div class="panel-body">
						{!!Form::open(['route'=>['admin.usossuelo.update', $usossuelo], 'method'=>'PUT'])!!}

						<div class="form-group">
							{!!Form::label('usoSuelo', 'Tipo uso suelo')!!}
							{!!Form::text('usoSuelo', $usossuelo->usoSuelo,['class'=>'form-control', 'placeholder'=>'Tipo uso suelo', 'required'])!!}
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