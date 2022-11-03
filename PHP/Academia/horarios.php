<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/horarios.css"/>
    <title>Horarios</title>
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
    <div>
        <h2>Horarios</h2>
        <table border="1">
            <tr>
                <th>Nivel</th>
                <th>Dia</th>
                <th>Hora</th> 
            </tr> 
            <?php 
                $sql = "SELECT nivel, dia, hora FROM clases;";
                $resultado = $conexion->query($sql);
                while ($datos = $resultado->fetch()){
                    echo '<tr>'.
                            '<td>'.$datos['nivel'].'  </td>'.
                            '<td>'.$datos['dia'].'</td>'.
                            '<td>'.$datos['hora'].'</td>'.
                        '</tr>';
                }
            ?>
        </table>
        <ul>
            <li><a href="index.php"><button>Volver al menú</button></a></li>
        </ul>
    </div>
</body>
</html>