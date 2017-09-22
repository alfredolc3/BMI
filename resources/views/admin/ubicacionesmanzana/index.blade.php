@extends('app')

@section('htmlheader_title')
    Nuevo Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Ubicacion dentro de la Manzana </div>
				<div class="panel-body">
				<a href="{{route('admin.ubicacionesmanzana.create')}}" class="btn btn-info"> Nuevo Registro </a>
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Ubicacion</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($ubicacionesmanzana as $ubicacion)
								<tr>
									<td>{{$ubicacion->id}}</td>
									<td>{{$ubicacion->ubicacionManzana}}</td>
									<td><a href="" class="btn btn-danger"></a>
										<a href="{{route('admin.ubicacionesmanzana.edit', $ubicacion->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
								</tr>
							@endforeach	
						</tbody>
					</table>
					{!! $ubicacionesmanzana->render()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
