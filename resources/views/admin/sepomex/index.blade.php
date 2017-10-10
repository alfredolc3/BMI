@extends('app')

@section('htmlheader_title')
Admin-Asentamientos
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Ciudades </div>
				<div class="panel-body">

					<form id="formAsentamiento">
						<div class="row">

							<div class="col-md-4">
								<div class="form-group">
									{!!Form::label('estado', 'Estado')!!}
									{!!Form::select('estado', $estados, null, ['class'=>'form-control', 'placeholder' => 'Seleccione una opcion...'])!!}
								</div>
							</div>

							
							<div class="col-md-4">
								<div class="form-group">
									{!!Form::label('municipio', 'Municipio')!!}
									{!!Form::text('municipio', null,['class'=>'form-control', 'placeholder'=>'Municipio',])!!}
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									{!!Form::label('ciudad', 'Ciudad')!!}
									{!!Form::text('ciudad', null,['class'=>'form-control', 'placeholder'=>'Ciudad'])!!}
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									{!!Form::label('tpredio', 'Tipo de Predio')!!}
									{!!Form::select('tpredio', ['Urbano'=>'Urbano', 'Rural'=>'Rustico'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione una opcion...'])!!}
								</div>
							</div>

							<div class="col-md-4">

								<div class="form-group">
									{!!Form::label('cp', 'Codigo Postal')!!}
									{!!Form::number('cp', null,['class'=>'form-control', 'placeholder'=>'Codigo Postal'])!!}
								</div>
							</div>

							<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('tasentamiento', 'Tipo de Asentamiento')!!}
								{!!Form::select('tasentamiento', $tiposasentamientos, null, ['class'=>'form-control', 'placeholder' => 'Seleccione una opcion...'])!!}
							</div>
							</div>

							<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('asentamiento', 'Nombre de Asentamiento')!!}
								{!!Form::text('asentamiento', null,['class'=>'form-control', 'placeholder'=>'Asentamiento'])!!}
							</div>	
							</div>
						</div>
						
						<div class="form-group">
							{!! Form::submit('Buscar',['class' => 'btn btn-primary']) !!}
						</div>	

					</form>

					<div id="resultados"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/js/admin/sepomex/index.js"></script>
@endsection
