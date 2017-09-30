@extends('app')

@section('htmlheader_title')
    Server error
@endsection

@section('contentheader_title')
    500 Error Page
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

    <div class="error-page">
        <h2 class="headline text-red">500</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-red"></i> Acceso restringido.</h3>
            <p>
                Usted no tiene acceso para ingresar a esta zona.
                <br>Quizas quiera regresar a la <a href='{{ url('/home') }}'>Pagina Principal</a>.
            </p>
        </div>
    </div><!-- /.error-page -->
@endsection