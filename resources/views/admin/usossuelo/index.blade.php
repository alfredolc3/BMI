@extends('app')

@section('htmlheader_title')
    Nuevo Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usos de Suelo</div>
				<div class="panel-body">
				<a href="{{route('admin.usossuelo.create')}}" class="btn btn-info"> Nuevo Registro </a>
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Uso de Suelo</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($usossuelo as $uso)
								<tr>
									<td>{{$uso->id}}</td>
									<td>{{$uso->usoSuelo}}</td>
									<td><a href="" class="btn btn-danger"></a><a href="" class="btn btn-warning"></a></td>
								</tr>
							@endforeach	
						</tbody>
					</table>
					{!! $usossuelo->render()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
