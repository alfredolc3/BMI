@extends('app')
	@section('htmlheader_title')
		Editar Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Tipo de Terreno {{$tipoTerreno->tipoTerreno}}</div>
					<div class="panel-body">
						{!!Form::open(['route'=>['admin.tiposterreno.update', $tipoTerreno], 'method'=>'PUT'])!!}

						<div class="form-group">
							{!!Form::label('tipoTerreno', 'Tipo de Terreno')!!}
							{!!Form::text('tipoTerreno', null,['class'=>'form-control', 'placeholder'=>'Tipo de Terreno', 'required'])!!}
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