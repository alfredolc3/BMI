@extends('app')

@section('htmlheader_title')
    Nuevo Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Ciudades </div>
				<div class="panel-body">
				<a href="{{route('admin.sepomex.create')}}" class="btn btn-info"> Nuevo Registro </a>
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Estado</th>
							<th>Municipio</th>
							<th>Ciudad</th>
							<th>Tipo de Predio</th>
							<th>Codigo Postal</th>
							<th>Asentamiento</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($sepomex as $sepome)
								<tr>
									<td>{{$sepome->id}}</td>
									<td>{{$sepome->estado}}</td>
									<td>{{$sepome->municipio}}</td>
									<td>{{$sepome->ciudad}}</td>
									<td>{{$sepome->tipoZona}}</td>
									<td>{{$sepome->cp}}</td>
									<td>{{$sepome->tipoAsentamiento . ' '. $sepome->asentamiento}}</td>
									<td><a href="" class="btn btn-danger"></a><a href="" class="btn btn-warning"></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{!! $sepomex->render()!!}					
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
