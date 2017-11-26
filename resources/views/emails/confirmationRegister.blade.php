<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Hola {{ $user->name }} </h2> 
    <p>Gracias por solicitar el registro al Sistema <strong>Base de Mercado Inmobiliario</strong> </p>
    <p>Ahora Puedes Ingresar al sistema.</p>
    <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>

    <a href="{{url('/')}}">Base de Mercado Inmobiliario</a>
    			
    <p>Tus Datos son:</p>
    <p><strong>Usuario: </strong>{{ $user->email }}</p>
    <p><strong>Contraseña: </strong>{{ $user->password }}</p>

    <h2>Recuerda cambiar tu contraseña una vez que hayas ingresado.</h2>
</body>
</html>