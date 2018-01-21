@extends('app')
@section('htmlheader_title')
Nuevo Predio
@endsection

@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Imagenes del predio</div>
				<div class="row">
					<div class="panel-body"> 
						@include('partials.error')

						{!! Form::open(['route'=> 'datos.imagenes.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
						{!! Form::hidden('id', $id, ['id' => 'id']) !!}
						<div class="dz-message" style="height:200px;">
							Sube tus Imagenes Aqui
						</div>
						<div class="dropzone-previews"></div>

						{!!Form::close()!!}
					</div>
				</div>

			 	<div class="row">
                    @foreach($imagenes as $imagen)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="/{{$imagen->ruta}}" alt="{{$imagen->nombre}}">
                            <div class="caption">
                                <h4>{{$imagen->nombre}}</h4> 
                                <a href="{{route('datos.imagenes.destroy', [$imagen->id, $imagen->idDatosPrincipales, $imagen->nombre])}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')">
                                	<img src="/img/delete.png" width="20" height="20"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/js/predios/imagenes/index.js"></script>
@endsection
