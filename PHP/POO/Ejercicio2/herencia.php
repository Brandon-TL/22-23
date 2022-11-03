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
        require_once 'Persona.php';
        require_once 'Alumno.php';
        require_once 'Boo.php';
        
        // Creo un objeto de la clase Persona
        $per = new Persona('nombre', 'apellidos');
        var_dump($per);
        
        // Creo un objeto de la clase Alumno
        $alu = new Alumno('nombre2', 'apellidos2', 7);
        echo "<br/>";
        var_dump($alu);
        
        // Llamamos a muestra
        $per->muestra();
        echo '<br>';
        $alu->muestra();
        echo '<br>';
        
        // get_parent_class
        echo 'La clase padre de alu es '. get_parent_class($alu)."<br/>";
        
        // is_subclass_of (objetos)
        if (is_subclass_of($alu, 'Persona')) {
            echo 'El objeto alu es instancia de una '.'subclase de la clase Persona<br/>';
        }
        
        // is_subclass_of (clases)
        if (is_subclass_of('Alumno', 'Persona')) {
            echo 'La clase Alumno es subclase de la clase Persona<br/>';
        }
        
        // Creamos objeto de la clase Boo, que implementa interfaces
        $b = new Boo();
        $b->foo();
        $b->bar();
        $b->baz();
    ?>
</body>
</html>