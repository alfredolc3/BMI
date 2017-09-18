@extends('app')
	@section('htmlheader_title')
		Nuevo Registro
	@endsection

	@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Nuevo Tipo Topografias</div>
					<div class="panel-body">
						{!!Form::open(['route'=>'admin.topografias.store', 'method'=>'POST'])!!}

						<div class="form-group">
							{!!Form::label('topografias', 'Tipo de topografia')!!}
							{!!Form::text('topografias', null,['class'=>'form-control', 'placeholder'=>'Tipo de topografia', 'required'])!!}
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