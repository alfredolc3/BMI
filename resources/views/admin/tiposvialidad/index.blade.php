@extends('app')

@section('htmlheader_title')
    Nuevo Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tipos de Vialidad </div>
				<div class="panel-body">
				<a href="{{route('admin.tiposvialidad.create')}}" class="btn btn-info"> Nuevo Registro </a>
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Tipo de Vialidad</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($tiposvialidad as $tipovialidad)
								<tr>
									<td>{{$tipovialidad->id}}</td>
									<td>{{$tipovialidad->tipoVialidad}}</td>
									<td><a href="" class="btn btn-danger"></a>
										<a href="{{route('admin.tiposvialidad.edit', $tipovialidad->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
								</tr>
							@endforeach	
						</tbody>
					</table>
					{!! $tiposvialidad->render()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
