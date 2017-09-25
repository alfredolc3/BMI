@extends('app')

@section('htmlheader_title')
    Admin-Usos de Suelo
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usos de Suelo</div>
				<div class="panel-body">
				<a href="{{route('admin.usossuelo.create')}}" class="btn btn-info"> Nuevo Registro </a>
				<!--Buscador -->
					{!! Form::open(['route'=>'admin.usossuelo.index', 'method' => 'GET', 'class'=>'navbar-form pull-right'])!!}
					<div class="input-group">
						{!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar', 'aria-describedby'=>'search'])!!}
						<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
					</div>
						{!! Form::close()!!}
				<!--Fin del Buscador -->
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
									<td>
										<a href="{{route('admin.usossuelo.destroy', $uso->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										
										<a href="{{route('admin.usossuelo.edit', $uso->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
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
