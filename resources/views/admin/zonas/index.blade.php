@extends('app')

@section('htmlheader_title')
   Admin-Zonas
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Clasificacion de las Zonas </div>
				<div class="panel-body">
				<a href="{{route('admin.zonas.create')}}" class="btn btn-info"> Nuevo Registro </a>
				<!--Buscador -->
					{!! Form::open(['route'=>'admin.zonas.index', 'method' => 'GET', 'class'=>'navbar-form pull-right'])!!}
					<div class="input-group">
						{!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar', 'aria-describedby'=>'search'])!!}
						<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
					</div>
						{!! Form::close()!!}
				<!--Fin del Buscador -->
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Zona</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($zonas as $zona)
								<tr>
									<td>{{$zona->id}}</td>
									<td>{{$zona->zona}}</td>
									<td>
										<a href="{{route('admin.zonas.destroy', $zona->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										<a href="{{route('admin.zonas.edit', $zona->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
									</td>
								</tr>
							@endforeach	
						</tbody>
					</table>
					{!! $zonas->render()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
