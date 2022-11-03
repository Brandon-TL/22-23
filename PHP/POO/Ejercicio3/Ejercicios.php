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
        require_once 'Operacion.php';
        require_once 'Suma.php';

        $op = new Operacion(4, 7);
        $sum = new Suma('Suma', 5, 6);

        var_dump($op);
        var_dump($sum);
    ?>
</body>
</html>