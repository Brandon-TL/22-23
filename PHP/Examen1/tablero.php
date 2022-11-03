<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen UT2 - Brandon Martínez Hernández</title>
</head>
<body>
    <?php
        $red = true;//Varialbe para alternar colores
        if ($_GET['rows'] < 1 ||$_GET['rows'] > 20) {
            echo $_GET['rows']." are INVALID SQUARE dimensions, please type a number between 1 and 20";
        } else {
            echo "<table style='border-collapse: collapse'>";
                for($i = 0; $i < $_GET['rows'];$i++)
                {
                    echo "<tr>";
                    for($j = 0; $j < $_GET['rows'];$j++) {
                        $t=$i+$j;
                        if($t%2==0) {
                            echo "<td height=50px width=50px bgcolor=black></td>";
                        } else {
                            echo "<td height=50px width=50px bgcolor=red></td>";
                        }
                    }
                    echo "</tr>";
                }
            echo "</table>";
        }
    ?>
</body>
</html>