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
					{!!Form::model($especificos, ['route'=>'predios.especificos.store', 'method'=>'POST'])!!}
					{!! Form::hidden('idDatosPrincipales') !!}

					<div class="d-inline-block bg-primary"><h3><B>UBICACION DEL PREDIO</B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('calle', 'Calle')!!}
								{!!Form::text('calle', null, ['class'=>'form-control'])!!}
							</div>
						</div>
						
						<div class="col-md-1">
							<div class="form-group">
								{!!Form::label('numero int.', 'N. Int')!!}
								{!!Form::text('numero int.', null, ['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								{!!Form::label('numero ext.', 'N. Ext')!!}
								{!!Form::text('numero ext.', null, ['class'=>'form-control'])!!}
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


					<div class="d-inline-block bg-primary"><h3><B>COORDENADAS GEOGRAFICAS</B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('longitud', 'Longitud')!!}
								{!!Form::number('longitud', null,['class'=>'form-control', 'placeholder'=>'Longitud'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('latitud', 'Latitud')!!}
								{!!Form::number('latitud', null,['class'=>'form-control', 'placeholder'=>'Latitud'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('altitud', 'Altitud')!!}
								{!!Form::number('altitud', null,['class'=>'form-control', 'placeholder'=>'Altitud'])!!}
							</div>			
						</div>															
					</div>

					<div class="d-inline-block bg-primary"><h3><B>TIPO Y REGIMEN </B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('tpredio', 'Tipo de Predio')!!}
								{!!Form::select('tpredio', ['Urbano'=>'Urbano', 'Rustico'=>'Rustico'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione tipo de inmueble'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('rpropiedad', 'Regimen de Propiedad')!!}
								{!!Form::select('rpropiedad', $regimen, null, ['class'=>'form-control', 'placeholder' => 'Seleccione Regimen de Propiedad'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('tterreno', 'Tipo de Terreno')!!}
								{!!Form::select('tterreno', $tipoTerreno, null, ['class'=>'form-control', 'placeholder' => 'Seleccione Tipo de Terreno...'])!!}
							</div>
						</div>
					</div>
					<div class="d-inline-block bg-primary"><h3><B>Superficies</B></h3></div>
					<div class="row">
						<div class="col-md-3">
					<div class="form-group">
						{!!Form::label('sterreno', 'Superficie de Terreno')!!}
						{!!Form::number('sterreno', null,['class'=>'form-control', 'placeholder'=>'Superficie de Terreno'])!!}
					</div>
						</div>
						<div class="col-md-3">
					<div class="form-group">
						{!!Form::label('sconstruccion', 'Superficie de Construccion')!!}
						{!!Form::number('sconstruccion', null,['class'=>'form-control', 'placeholder'=>'Superficie de Construccion'])!!}
					</div>
						</div>
						<div class="col-md-3">
					<div class="form-group">
						{!!Form::label('scomun', 'Superficie Comun')!!}
						{!!Form::number('scomun', null,['class'=>'form-control', 'placeholder'=>'Superficie Comun'])!!}
					</div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
						{!!Form::label('indiviso', 'Indiviso')!!}
						{!!Form::number('indiviso', null,['class'=>'form-control', 'placeholder'=>'Indiviso'])!!}
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
<script type="text/javascript" src="/js/predios/especificos.js"></script>
@endsection
