<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies Visitas</title>
    <style>
    </style>
</head>
<body>
    <?php
        session_start();

        if (session_start()) {
            if (!isset($_SESSION['visitas'])) {
                $_SESSION['visitas'][] = time();
                echo "<h1>Bienvenido nuevo usuario!</h1>";
            } else {
                echo "<h1>Que gusto volverte a ver usuario!</h1>";
                echo "<h2>Tus visitas anteriores han sido:</h2>";
                
                foreach ($_SESSION['visitas'] as $visita) {
                    echo date("d/m/y \a \l\a\s H:i:s", $visita)."<br>";
                }
                $_SESSION['visitas'][] = time();
            }
        }
    ?>

    <form method="POST">
        <button id='clear' name='clear'>ELIMINAR VISITAS</button><br><br>
        <?php
            if (isset($POST['clear'])) {
                session_destroy();
            }
        ?>
    </form>
</body>
</html>