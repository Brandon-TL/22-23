<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <!-- Realiza un programa que calcule la media de tres números. -->
        <?php
            $v1 = 10;
            $v2 = 20;
            $v3 = 231;
            $media = ($v1 + $v2 + $v3 )/3;
            echo "Los numeros introducidos son: ".$v1.", ".$v2.", ".$v3;
            echo " y su media es: ".$media;
        ?>
        <hr>
        <!-- Realizar un programa que intercambie el valor de dos variables. -->
        <?php
            $v1 = "Hola";
            $v2 = "Adios";
            $vAux;//Variable Auxiliar
            //Es una variable necesaria ya que necesitamos guardar en algun sitio
            //el valor de $v1, ya que al asignarle el valor de $v2 este se pierde
            echo "Variable 1: ".$v1.", Varible 2: ".$v2;
            echo "<br><br>";
            $vAux = $v1;//Damos a la variable auxiliar el valor de $v1
            $v1 = $v2;//Damos a $v1 el valor de la variable $v2
            $v2 = $vAux;//Damos a $v2 el valor de la varibale auxiliar que
            //realmente es el valor de  $v1
            echo "Variable 1: ".$v1.", Varible 2: ".$v2;
        ?>
        <hr>
        <!-- Realizar un programa que desglose una cantidad de euros en billetes
        de 10 y 5 y monedas de 1 euro. -->
        <?php
            $total = 77;//Valor total que queremos desglosar.
            $rest = $total%10;//Valor de dinero que NO podemos desglosar en billetes de 10.
            $b10 = ($total - $rest)/10;//Numero de billetes desglosados entre 10.
            echo "El dinero a simplificar es de ".$total." Euro/s<br>";
            echo "<br>Que es un total de:<br>";
            echo $b10." billete/s de 10 Euros.<br>";
            $rest2 = $rest%5;//Valor de dinero que NO podemos desglosar en billetes de 5.
            //Realmente es el numero de monedas de 1 euro.
            $b5 = ($rest - $rest2)/5;//Numeros de billetes desglosados entre 5.
            echo $b5." billete/s de 5 Euros.<br>";
            echo $rest2." moneda/s de 1 Euro.";
        ?>
    </body>
</html>
