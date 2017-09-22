@extends('app')

@section('htmlheader_title')
    Nuevo Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tipos de Inmuebles </div>
				<div class="panel-body">
				<a href="{{route('admin.tipologiasinmueble.create')}}" class="btn btn-info"> Nuevo Registro </a>
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Tipo de Inmueble</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($tipologiasinmueble as $tipologiainmueble)
								<tr>
									<td>{{$tipologiainmueble->id}}</td>
									<td>{{$tipologiainmueble->tipoInmueble}}</td>
									<td><a href="" class="btn btn-danger"></a><a href="{{route('admin.tipologiasinmueble.edit', $tipologiainmueble->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></a></td>
								</tr>
							@endforeach	
						</tbody>
					</table>
					{!! $tipologiasinmueble->render()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
