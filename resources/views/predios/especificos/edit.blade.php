@extends('app')

@section('css')
<style type="text/css">
	#map {
        height: 100%;
      }
</style>
@endsection

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
					{!!Form::open(['route'=>'datos.especificos.update', 'method'=>'PUT'])!!}

					{!! Form::hidden('idDatosPrincipales', $idDatosPrincipales) !!}
					{!! Form::hidden('idSepomex', $especificos->idSepomex,  ['id'=>'idSepomex']) !!}

					<div class="d-inline-block bg-primary"><h3><B>UBICACION DEL PREDIO</B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('calle', 'Calle')!!}
								{!!Form::text('calle', $especificos->calle, ['class'=>'form-control'])!!}
							</div>
						</div>
						
						<div class="col-md-1">
							<div class="form-group">
								{!!Form::label('numeroInt', 'N. Int')!!}
								{!!Form::text('numeroInt', $especificos->numeroInt, ['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								{!!Form::label('numeroExt', 'N. Ext')!!}
								{!!Form::text('numeroExt', $especificos->numeroExt, ['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								{!!Form::label('cp', 'Codigo Postal')!!}
								<div class="input-group">
									{!!Form::number('cp', $especificos->cp,['class'=>'form-control'])!!}
									<span class="input-group-btn">
										<button class="btn btn-warning" id="cp-buscar" type="button" data-toggle="tooltip" title="Buscar"><i class="fa fa-search"></i></button>
									</span>
								</div><!-- /input-group -->
							</div>
						</div>

						<div id="asentamientos"></div>
						
					</div>


					<div class="d-inline-block bg-primary"><h3><B>COORDENADAS GEOGRAFICAS</B></h3></div>
					<div id="map" style="margin: 0 auto; width:90%; height:400px;"></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('longitud', 'Longitud')!!}
								{!!Form::number('longitud', $especificos->longitud,['class'=>'form-control', 'step'=>'any', 'placeholder'=>'Longitud'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('latitud', 'Latitud')!!}
								{!!Form::number('latitud', $especificos->latitud,['class'=>'form-control', 'step'=>'any','placeholder'=>'Latitud'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('altitud', 'Altitud')!!}
								{!!Form::number('altitud', $especificos->altitud,['class'=>'form-control', 'step'=>'any', 'placeholder'=>'Altitud'])!!}
							</div>			
						</div>															
					</div>

					<div class="d-inline-block bg-primary"><h3><B>TIPO Y REGIMEN </B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('tipoPredio', 'Tipo de Predio')!!}
								{!!Form::select('tipoPredio', ['Urbano'=>'Urbano', 'Rustico'=>'Rustico'], $especificos->tipoPredio, ['class'=>'form-control', 'placeholder' => 'Seleccione tipo de inmueble'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idRegimenPropiedad', 'Regimen de Propiedad')!!}
								{!!Form::select('idRegimenPropiedad', $regimen, $especificos->idRegimenPropiedad, ['class'=>'form-control', 'placeholder' => 'Seleccione Regimen de Propiedad'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idTipoTerreno', 'Tipo de Terreno')!!}
								{!!Form::select('idTipoTerreno', $tipoTerreno, $especificos->idTipoTerreno, ['class'=>'form-control', 'placeholder' => 'Seleccione Tipo de Terreno...'])!!}
							</div>
						</div>
					</div>
					<div class="d-inline-block bg-primary"><h3><B>Superficies</B></h3></div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('superficieTerreno', 'Superficie de Terreno')!!}
								{!!Form::number('superficieTerreno', $especificos->superficieTerreno,['class'=>'form-control', 'step'=>'any', 'placeholder'=>'Superficie de Terreno'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('superficieConstruccion', 'Superficie de Construccion')!!}
								{!!Form::number('superficieConstruccion', $especificos->superficieConstruccion,['class'=>'form-control', 'step'=>'any', 'placeholder'=>'Superficie de Construccion'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('idUsoSuelo', 'Uso de Suelo')!!}
								{!!Form::select('idUsoSuelo', $usoSuelo, $especificos->idUsoSuelo, ['class'=>'form-control', 'placeholder' => 'Seleccione uso de suelo...', 'required'])!!}
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
<script type="text/javascript" src="/js/predios/especificos/edit.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ0i7nvxdKfnGnPzXmk7AHZCbBUopZr-4&callback=initMap"></script>
@endsection
