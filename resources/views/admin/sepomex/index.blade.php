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
				<a href="{{route('admin.sepomex.create')}}" class="btn btn-info"> Nuevo Registro </a>
				
				<!--Buscador -->
					{!! Form::open(['route'=>'admin.sepomex.index', 'method' => 'GET', 'class'=>'navbar-form pull-right'])!!}
					<div class="input-group">
						{!!Form::text('asentamiento', null, ['class'=>'form-control', 'placeholder'=>'Buscar', 'aria-describedby'=>'search'])!!}
						<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
					</div>
						{!! Form::close()!!}
				<!--Fin del Buscador -->




					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Estado</th>
							<th>Municipio</th>
							<th>Ciudad</th>
							<th>Tipos de Predio</th>
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
									<td>
										<a href="{{route('admin.sepomex.destroy', $sepome->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></a>
										<a href="{{route('admin.sepomex.edit', $sepome->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
									</td>
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
