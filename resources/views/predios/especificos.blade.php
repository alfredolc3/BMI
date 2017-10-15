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
					{!!Form::open(['route'=>'predios.especificos.store', 'method'=>'POST'])!!}


					<div class="d-inline-block bg-primary"><h3><B>UBICACION DEL PREDIO</B></h3></div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								{!!Form::label('calle', 'Calle')!!}
								{!!Form::text('calle', $especificos->calle, ['class'=>'form-control', 'required'])!!}
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="form-group">
								{!!Form::label('numero', 'Numero')!!}
								{!!Form::text('numero', null, ['class'=>'form-control', 'required'])!!}
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								{!!Form::label('cp', 'Codigo Postal')!!}
								{!!Form::number('cp', null,['class'=>'form-control', 'placeholder'=>'Codigo Postal', 'required'])!!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!!Form::label('colonia', 'Colonia')!!}
								{!!Form::select('colonia', ['Renta'=>'Renta', 'Venta'=>'Venta'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione colonia...', 'required'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('estado', 'Estado')!!}
								{!!Form::select('estado', ['Renta'=>'Renta', 'Venta'=>'Venta'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione estado...', 'required'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('municipio', 'Municipio')!!}
								{!!Form::select('municipio', ['Renta'=>'Renta', 'Venta'=>'Venta'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione municipio...', 'required'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('ciudad', 'Ciudad')!!}
								{!!Form::select('ciudad', ['Renta'=>'Renta', 'Venta'=>'Venta'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione ciudad...', 'required'])!!}
							</div>
						</div>
					</div>


					<div class="d-inline-block bg-primary"><h3><B>COORDENADAS GEOGRAFICAS</B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('longitud', 'Longitud')!!}
								{!!Form::number('longitud', null,['class'=>'form-control', 'placeholder'=>'Longitud', 'required'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('latitud', 'Latitud')!!}
								{!!Form::number('latitud', null,['class'=>'form-control', 'placeholder'=>'Latitud', 'required'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('altitud', 'Altitud')!!}
								{!!Form::number('altitud', null,['class'=>'form-control', 'placeholder'=>'Altitud', 'required'])!!}
							</div>			
						</div>															
					</div>

					<div class="d-inline-block bg-primary"><h3><B>TIPO Y REGIMEN </B></h3></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('tpredio', 'Tipo de Predio')!!}
								{!!Form::select('tpredio', ['Urbano'=>'Urbano', 'Rustico'=>'Rustico'], null, ['class'=>'form-control', 'placeholder' => 'Seleccione tipo de inmueble', 'required'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('rpropiedad', 'Regimen de Propiedad')!!}
								{!!Form::select('rpropiedad', $regimen, null, ['class'=>'form-control', 'placeholder' => 'Seleccione Regimen de Propiedad', 'required'])!!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!!Form::label('tterreno', 'Tipo de Terreno')!!}
								{!!Form::select('tterreno', $tipoTerreno, null, ['class'=>'form-control', 'placeholder' => 'Seleccione Tipo de Terreno...', 'required'])!!}
							</div>
						</div>
					</div>
					<div class="d-inline-block bg-primary"><h3><B>Superficies</B></h3></div>
					<div class="row">
						<div class="col-md-3">
					<div class="form-group">
						{!!Form::label('sterreno', 'Superficie de Terreno')!!}
						{!!Form::number('sterreno', null,['class'=>'form-control', 'placeholder'=>'Superficie de Terreno', 'required'])!!}
					</div>
						</div>
						<div class="col-md-3">
					<div class="form-group">
						{!!Form::label('sconstruccion', 'Superficie de Construccion')!!}
						{!!Form::number('sconstruccion', null,['class'=>'form-control', 'placeholder'=>'Superficie de Construccion', 'required'])!!}
					</div>
						</div>
						<div class="col-md-3">
					<div class="form-group">
						{!!Form::label('scomun', 'Superficie Comun')!!}
						{!!Form::number('scomun', null,['class'=>'form-control', 'placeholder'=>'Superficie Comun', 'required'])!!}
					</div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
						{!!Form::label('indiviso', 'Indiviso')!!}
						{!!Form::number('indiviso', null,['class'=>'form-control', 'placeholder'=>'Indiviso', 'required'])!!}
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