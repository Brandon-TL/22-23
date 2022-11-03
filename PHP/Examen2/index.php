<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen UT4 - Brandon Martínez Hernández</title>
    <style>
        td {
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>
    <form id="data" method="get">
        <table>
            <tr>
                <td><label for="name">Introduzaca el nombre del producto que desea buscar</label></td>
            </tr>
            <tr>
                <td><input type="text" id="name" name="name" required>&emsp;<input type="submit" value="BUSCAR" id="buscar" name="buscar"/></td>
            </tr>
        </table>
    </form>
        <table>
            <?php
                include_once 'conexion.php';
                if(isset($_GET['buscar'])) { 
                    $buscar = $_GET['name'];
                    $consulta = "SELECT * FROM producto WHERE nombre_corto LIKE ?;";
                    $sentencia = $conexion->prepare($consulta, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,]);
                    
                    if ($buscar === null) {
                        $sentencia->execute();
                    } else {
                        $parametros = ["%$buscar%"];
                        $sentencia->execute($parametros);
                    }
                    
                    echo "Se han encontrado ".$sentencia->rowCount()." resultados simalares a: ".$buscar;
                    if ($sentencia->rowCount() > 0) {
                        echo '<table>'.
                                '<tr>'.
                                    '<th width="100px">cod</td>'.
                                    '<th width="100px">nombre_corto</td>'.
                                    '<th width="250px">descripcion</td>'.
                                    '<th width="100px">PVP</td>'.
                                    '<th width="100px">PVP Black Friday</td>'.
                                    '<th>familia</td>'.
                                '</tr>';
                        while ($producto = $sentencia->fetchObject()){
                            echo '<tr>'.
                                    '<td width="100px">'.$producto->cod.'  </td>'.
                                    '<td width="100px">'.$producto->nombre_corto.'  </td>'.
                                    '<td width="250px">'.$producto->descripcion.'  </td>'.
                                    '<td width="100px">'.$producto->PVP.'  </td>'.
                                    '<td width="100px">'.$producto->PVP.'  </td>'.
                                    '<td>'.$producto->familia.'  </td>'.
                                '</tr>';
                        }
                        echo '</table>';
                    }
                }
            ?>
        </table>
    <a href="crearTienda.php"><button>CREAR TIENDA</button></a>
</body>
</html>

<!-- 
realizar la misma operacion de seleccion
    SELECT * FROM `producto` WHERE PVP >= 100; 
a todos los resultados de este select quitarle el 10% del valor de PVP


    SELECT * FROM `producto` WHERE PVP < 100;
y a todos los resultados de este select quitarle el 5% del valor de PVP
-->