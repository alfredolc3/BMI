@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Regímen {{$regimen->regimen}}</div>
					<div class="panel-body">
						{!!Form::open(['route'=>['admin.regimenes.update', $regimen], 'method'=>'PUT'])!!}

						<div class="form-group">
							{!!Form::label('regimen', 'Regímen de Predio')!!}
							{!!Form::text('regimen', $regimen->regimen,['class'=>'form-control', 'placeholder'=>'Regímen de Predio', 'required'])!!}
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