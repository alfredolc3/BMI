@extends('app')

@section('htmlheader_title')
Nuevo Predio
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Datos Especificos</div>

				<div class="panel-body">
					@include('partials.error')
					{!!Form::open(['route'=>'datos.especificos.store', 'method'=>'POST'])!!}
					
					{!! Form::hidden('idDatosPrincipales', $idDatosPrincipales) !!}

					<div class="row">
						<div class="col-md-10">
					<div class="d-inline-block bg-primary"><h3><CENTER><B>UBICACION DEL PREDIO</B></CENTER></h3></div>
				</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('calle', 'Calle')!!}
								{!!Form::text('calle', null, ['class'=>'form-control'])!!}
							</div>
						</div>
						
						<div class="col-md-1">
							<div class="form-group">
								{!!Form::label('numeroInt.', 'N. Int')!!}
								{!!Form::text('numeroInt.', null, ['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								{!!Form::label('numeroExt.', 'N. Ext')!!}
								{!!Form::text('numeroExt.', null, ['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								{!!Form::label('cp', 'Codigo Postal')!!}
								<div class="input-group">
									{!!Form::number('cp', null,['class'=>'form-control'])!!}
									<span class="input-group-btn">
										<button class="btn btn-warning" id="cp-buscar" type="button" data-toggle="tooltip" title="Buscar"><i class="fa fa-search"></i></button>
									</span>
								</div><!-- /input-group -->
							</div>
						</div>
						<div id="asentamientos"></div>
						
					</div>


					<div class="row">
						<div class="col-md-10">
					<div class="d-inline-block bg-primary"><h3><CENTER><B>COORDENADAS GEOGRAFICAS</B></CENTER></h3></div>
				</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('longitud', 'Longitud')!!}
								{!!Form::number('longitud', null,['class'=>'form-control', 'step'=>'any', 'placeholder'=>'Longitud'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('latitud', 'Latitud')!!}
								{!!Form::number('latitud', null,['class'=>'form-control', 'step'=>'any','placeholder'=>'Latitud'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('altitud', 'Altitud')!!}
								{!!Form::number('altitud', null,['class'=>'form-control', 'step'=>'any', 'placeholder'=>'Altitud'])!!}
							</div>			
						</div>															
					</div>

					<div class="row">
						<div class="col-md-10">
						<div class="d-inline-block bg-primary"><h3><CENTER><B>TIPO Y REGIMEN </B></CENTER></h3></div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('tipoPredio', 'Tipo de Predio')!!}
								{!!Form::select('tipoPredio', ['Urbano'=>'Urbano', 'Rustico'=>'Rustico'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione tipo de inmueble'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('idRegimenPropiedad', 'Regimen de Propiedad')!!}
								{!!Form::select('idRegimenPropiedad', $regimen, null, ['class'=>'form-control', 'placeholder' => 'Seleccione Regimen ....'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('idTipoTerreno', 'Tipo de Terreno')!!}
								{!!Form::select('idTipoTerreno', $tipoTerreno, null, ['class'=>'form-control', 'placeholder' => 'Seleccione Tipo de Terreno...'])!!}
							</div>
						</div>
					</div>

					
					<div class="row">
						<div class="col-md-10">
							<div class="d-inline-block bg-primary"><h3><CENTER><B>SUPERFICIES</B></CENTER></h3></div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('sterreno', 'Superficie de Terreno')!!}
								{!!Form::number('sterreno', null,['class'=>'form-control', 'step'=>'any', 'placeholder'=>'Superficie de Terreno'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('sconstruccion', 'Superficie de Construccion')!!}
								{!!Form::number('sconstruccion', null,['class'=>'form-control', 'step'=>'any', 'placeholder'=>'Superficie de Construccion'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('UsoSuelo', 'Uso de Suelo')!!}
								{!!Form::select('UsoSuelo', $usoSuelo, null, ['class'=>'form-control', 'placeholder' => 'Seleccione uso de suelo...'])!!}
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
@endsection

@section('js')
<script type="text/javascript" src="/js/predios/especificos/especificos.js"></script>
@endsection
