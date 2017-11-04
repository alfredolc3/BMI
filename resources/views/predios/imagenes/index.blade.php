@extends('app')
@section('htmlheader_title')
Nuevo Predio
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Datos Generales</div>
				<div class="row">
					<div class="panel-body"> 
						@include('partials.error')

						{!! Form::open(['route'=> 'datos.imagenes.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
						<div class="dz-message" style="height:200px;">
							Sube tus Imagenes Aqui
						</div>
						<div class="dropzone-previews"></div>


						<div class="form-group">
							{!! Form::submit('Guardar Imagenes',['class' => 'btn btn-primary']) !!}
						</div>	

						{!!Form::close()!!}

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/js/predios/imagenes/index.js"></script>
@endsection
