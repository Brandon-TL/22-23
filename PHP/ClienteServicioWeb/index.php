<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $url = 'http://localhost/HundirLaFlota/ServicioWebCalculadora/';
        $uri = 'http://localhost/HundirLaFlota/ServicioWebCalculadora/';

        $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
        $suma = $cliente->suma(7.5, 7.5);
        $resta = $cliente->resta(30, 15);

        print("La suma de 7.5 y 7.5 es $suma");
        print("La resta de 30 y 15 es $resta");
    ?>
</body>
</html>