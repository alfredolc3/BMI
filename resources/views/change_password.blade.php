@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					{!! Form::password('old_password', ['class'=>'form-control']) !!}
					{!! Form::password('password', ['class'=>'form-control']) !!}
					{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
