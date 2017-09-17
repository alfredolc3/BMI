@extends('app')

@section('htmlheader_title')
    Nuevo Registro
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usuarios  </div>
				<div class="panel-body">
				<a href="{{route('admin.users.create')}}" class="btn btn-info"> Registrar Nuevo Usuario</a>
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Tipo</th>
							<th>Acción</th>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{$user->id}}</td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>
										@if($user->type=="Administrador")
											<span class="label label-danger">{{$user->type}}</span>
										@else
											<span class="label label-success">{{$user->type}}</span>
										@endif
									</td>
									<td><a href="" class="btn btn-danger"></a><a href="" class="btn btn-warning"></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{!! $users->render()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
