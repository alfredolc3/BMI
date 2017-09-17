@extends('app')

@section('htmlheader_title')
    Nuevo Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Regímenes de Propiedad </div>
				<div class="panel-body">
				<a href="{{route('admin.regimenes.create')}}" class="btn btn-info"> Nuevo Registro </a>
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Regimen</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($regimenes as $regimen)
								<tr>
									<td>{{$regimen->id}}</td>
									<td>{{$regimen->regimen}}</td>
									<td><a href="" class="btn btn-danger"></a><a href="" class="btn btn-warning"></a></td>
								</tr>
							@endforeach	
						</tbody>
					</table>
					{!! $regimenes->render()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
