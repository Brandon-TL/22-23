
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
                <td><label for="cod">Codigo de tienda:</label></td>
                <td><input type="number" id="cod" name="cod" required></td>
            </tr>
            <tr>
                <td><label for="nombre">Nombre de la tienda:</label></td>
                <td><input type="text" id="nombre" name="nombre" required></td>
            </tr>
            <tr>
                <td><label for="tel">Telefono de contacto:</label></td>
                <td><input type="tel" id="tel" name="tel" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="CREAR" id="crear" name="crear"/></td>
                <td><a href="index.php"><button>VOLVER</button></a></td>
            </tr>
        </table>
    </form>
        <table>
            <?php
                include_once 'conexion.php';
                $sql = "SELECT * FROM tienda;"; 
                $query = $conexion->prepare($sql); 
                $query -> execute(); 
                $resultados = $query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0) {
                    echo "<table>";
                    foreach($resultados as $result) {
                        echo "<tr>
                            <td>".$result -> cod."</td>
                            <td>".$result -> nombre."</td>
                            <td>".$result -> tlf."</td>
                        </tr>";
                    }
                    echo "</table>";
                }
                
                if(isset($_GET['crear'])) {
                    $nombre = $_GET['nombre'];
                    $tel = $_GET['tel'];
                    $cod = $_GET['cod'];

                    $consulta = "INSERT INTO tienda (cod, nombre, tlf) VALUES (:cod, :nombre, :tlf);";
                    $consulta = $conexion->prepare($consulta);
                    $stock = "INSERT INTO stock (producto, tienda, unidades) VALUES (3DSNG, ".$nombre.", ".$cod."), (ACERAX3950, ".$nombre.", ".$cod."),(EEEPC1005PXD, ".$nombre.", ".$cod.");";
                    
                    $consulta->bindParam(':cod', $cod, PDO::PARAM_INT, 25);
                    $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR, 25);
                    $consulta->bindParam(':tlf', $tel, PDO::PARAM_INT, 25);
                    
                    $consulta->execute();
                    $stock = $conexion->query($stock);
                    
                    $ultimoInsert = $conexion->lastInsertId();
                    if($ultimoInsert > 0) {
                        echo "Tienda nueva con cod ".$cod." y nombre ".$nombre." abierta en la ciudad.";
                    } else {
                        echo "No se ha podido abrir la tienda.<br>";
                        print_r($consulta->errorInfo());
                    }
                }
            ?>
        </table>
</body>
</html>