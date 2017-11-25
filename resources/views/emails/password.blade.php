<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Cambio de Contraseña de BMI</title>
</head>
<body>
    <p>Hola!</p>
    <p>Si usted ha solicitado el cambio de la contraseña para el sistema <b>Base de Mercado Inmobiliario</b> siga el siguiente link</p>
    <ul>
        <li><a href="{{url('password/reset/'.$token)}}"> Recuperar Contraseña </a></li>
    </ul>

    <p>De lo contrario haga caso omisio a este correo</p>
    
</body>
</html>