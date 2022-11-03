<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/matriculas.css"/>
    <title>Matriculas</title>
</head>
<body>
    <?php
        include './conexion.php';
    ?>
    <h1>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/1200px-Flag_of_the_United_Kingdom_%283-5%29.svg.png"/>
        &emsp;Academia de Inglés&emsp;
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/1200px-Flag_of_the_United_Kingdom_%283-5%29.svg.png"/>
    </h1>
    <p>Matrícula online</p>
    <div>
        <fieldset>
            <legend>Datos de matrícula</legend>
            <form id="data" method="post">
                <table>
                    <tr>
                        <td><label for="name">Nombre:</label></td>
                        <td><input type="text" id="name" name="name" required></td>
                    </tr>
                    <tr>
                        <td><label for="dni">DNI:</label></td>
                        <td><input type="text" id="dni" name="dni" required></td>
                    </tr>
                    <tr>
                        <td><label for="tel">Teléfono:</label></td>
                        <td><input type="tel" id="tel" name="tel" required></td>
                    </tr>
                    <tr>
                        <td><label for="age">Edad:</label></td>
                        <td><input type="number" id="age" name="age" min="0" max="120" required></td>
                    </tr>
                    <tr>
                        <td><label for="level">Nivel:</label></td>
                        <td>
                            <select id="level" name="level">
                                <option value="none" selected disabled>Seleccione nivel</option>
                                <?php
                                    $sql = "SELECT nivel, dia, hora FROM clases;";
                                    $result = $conexion->query($sql);

                                    while ($data = $result->fetch()) {
                                        echo '<option value="'.
                                                $data['nivel'].'">'.
                                                $data['nivel'].' '.
                                                $data['dia'].' '.
                                                $data['hora'].
                                            '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <ul>
            <li><button type="submit" form="data" id="accept" name="accept">Aceptar</button></li>
            <li><a href="index.php"><button>Volver al menú</button></a></li>
        </ul>
    </div>
    <?php
        if(isset($_POST['accept'])) { 
            $name = $_POST['name'];
            $dni = $_POST['dni'];
            $tel = $_POST['tel'];
            $age = $_POST['age'];
            $level = $_POST['level'];

            $sql = "SELECT nivel,dia,hora from clases";
            $result = $conexion->query($sql);
            while ($data = $result->fetch()) {
                if($level == $data['nivel']) {
                    $day = $data['dia'];
                    $hour = $data['hora'];
                }
            }
            
            $conexion->beginTransaction();
            $completed = false;

            $sql="INSERT INTO alumno(nombre, dni, telefono, edad, nivel, dia, hora) VALUES(?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $array=[$name, $dni, $tel, $age, $level, $day, $hour];
            if($query->execute($array)) {
                $completed = true;
            }
            
            if($completed) {
                $conexion->commit();
                $sql="SELECT nivel, dia, hora FROM clases";
                $result = $conexion->query($sql);
                while ($data = $result->fetch()) {
                    if($level == $data['nivel']) {
                        echo 'Te has matriculado en el nivel '.$data['nivel'].
                                ' los '.$data['dia'].
                                ' a las '.$data['hora'].
                                ' de forma exitosa.';
                    }
                }
            } else {
                $conexion->rollBack();
                echo 'Error';
            }
        }
    ?>
</body>
</html>