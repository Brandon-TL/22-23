<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen UT2 - Brandon Martñinez Hernández</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table>
            <tr>
                <td><label for="name">Nombre & Apellidos: </label></td>
                <td><input type="text" id="name" name="name"></td>
            </tr>
            <tr>
                <td><label for="dni">DNI/NIF: </label></td>
                <td><input type="text" id="dni" name="dni"></td>
            </tr>
            <tr>
                <td><label for="age">Edad: </label></td>
                <td><input type="number" id="age" min="0" name="age"></td>
            </tr>
            <tr>
                <td><label for="height">Altura (cm): </label></td>
                <td><input type="number" id="height" min="0" name="height"></td>
            </tr>
            <tr>
                <td><label for="tel">Telefono: </label></td>
                <td><input type="text" id="tel" name="tel"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        <button type="submit">ENTRAR</button><br><br><br>

    <?php
        $name = $dni = $age = $height = $tel = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = verifyName($_POST["name"]);
            $dni = verifyDNI($_POST["dni"]);
            $age = verifyAge($_POST["age"]);
            $height = verifyHeight($_POST["height"]);
            $tel = verifyTel($_POST["tel"]);
        }
        
        if (($age >=18 && $age <=30) && ($height >=160 && $height <=200)) {
            echo "Hola ".$name." con DNI ".$dni." y telefono ".$tel.".Tienes ".$age." anios y una altura de ".$height." metros. Cumples los requisitos para aplicar a la T.I.A. Tu solicitud ha sido recogida y destruida. No existimos, no te llamaremos, nunca has recibido este mensaje ni has rellenado ningun formulario.";
        }
        
        function verifyName($data) {
            if (!preg_match("/^[a-zA-Z]/",$data)) {
                echo "El nombre tiene caracteres prohibidos.<br>";
            } else {
                echo "El nombre ".$data." es correcto.<br>";
            }
        }
        
        function verifyDNI ($data) {
            if (!preg_match("/^[0-9]{7,8}[A-Za-z]$/",$data)) {
                echo "El DNI/NIF tiene caracteres prohibidos.<br>";
            } else {
                echo "El DNI/NIF ".$data." es correcto.<br>";
            }
        }
        
        function verifyAge ($data) {
            if ($data < 0 || $data > 120) {
                echo "El edad introducidad no es valida.<br>";
            } else {
                echo "La edad ".$data." escorrecta.<br>";
            }
        }
        
        function verifyHeight($data) {
            if ($data <= 0 || $data > 250) {
                echo "El candidato no cumple con limites la estatura.<br>";
            } else {
                echo "La altitud ".$data."(cm) es correcta.<br>";
            }
        }
        
        function verifyTel($data) {
            if (!preg_match("/^[6-9]{1}[0-9]{8}$/",$data)) {
                echo "El telefono introducido no es correcto.<br>";
            } else {
                echo "El telefono ".$data." es correcto.<br>";
            }
        }
        
        
    ?>
    </form>
</body>
</html>