@extends('auth.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>B</b>ase de <b>M</b>ercado <b>I</b>nmobiliario</a>
        </div><!-- /.login-logo -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>oops!</strong> Hubo algunos problemas con su Ingreso.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-box-body">
    <p class="login-box-msg">Ingrese sus datos para Iniciar Sesion</p>
    <form action="{{ route('auth.login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
            </div><!-- /.col -->
        </div>
    </form>
    <br>
    <a href="{{ url('/password/email') }}">Olvidé mi contraseña</a><br>
    <!--{{Hash::make("12345")}}-->
    <!--<a href="{{ url('/auth/register') }}" class="text-center">Register a new membership</a>-->

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

    @include('auth.scripts')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
