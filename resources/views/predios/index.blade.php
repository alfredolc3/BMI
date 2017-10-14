@extends('app')

@section('htmlheader_title')
Predios
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Predio Comparables </div>
				<div class="panel-body">
					Predios Existentes que haya guardado el perito 5 si es usuario gratuito 
				
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Inmueble</th>
							<th>Registro</th>
							<th>Informante</th>
							<th>Operacion</th>
							<th>Valor</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($datosprincipales as $datos)
								<tr>
									<td>{{$datos->id}}</td>
									<td>{{$datos->idTipoInmueble}}</td>
									<td>{{$datos->fechaRegistro}}</td>
									<td>{{$datos->informante}}</td>
									<td>{{$datos->tipoOperacion}}</td>
									<td>{{$datos->valorOperacion}}</td>
									<td>
										<a href="{{route('predios.predios.edit', $datos->id)}}" data-toggle="tooltip" title="Editar Datos Genreales" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
										<a href="{{route('predios.especificos.index', $datos->id)}}" data-toggle="tooltip" title="Editar Datos Especificos" class="btn btn-info"><span class="fa fa-book"></span></a>
										<a href="{{route('predios.caracteristicas.index', $datos->id)}}" data-toggle="tooltip" title="Editar Caracteristicas de Predio" class="btn btn-primary"><span class="fa fa-home"></span></a>
										<a href="#" data-toggle="tooltip" title="Cargar Imagenes" class="btn btn-warning"><span class="glyphicon glyphicon-picture"></span></a>
										<a href="#" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>

									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{!! $datosprincipales->render()!!}
				</div>
			</div>
		</div>
	</div>
	@endsection
