@extends('app')

@section('htmlheader_title')
    Nuevo Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Topografias </div>
				<div class="panel-body">
				<a href="{{route('admin.topografias.create')}}" class="btn btn-info"> Nuevo Registro </a>
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Topografia</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($topografias as $topografia)
								<tr>
									<td>{{$topografia->id}}</td>
									<td>{{$topografia->topografia}}</td>
									<td><a href="" class="btn btn-danger"></a>
										<a href="{{route('admin.topografias.edit', $topografia->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
								</tr>
							@endforeach	
						</tbody>
					</table>
					{!! $topografias->render()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
