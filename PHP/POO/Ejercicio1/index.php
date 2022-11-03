<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <?php
        require_once 'Producto.php';
        require_once 'DB.php';

        $p = new Producto('GALAXY6');
        $p->nombre = 'Samsung Galaxy S6';
        $p->color = 'rojo';

        if ($p instanceof Producto) {
            echo 'p es instancia de la clase Producto </br>';
        }

        echo 'La clase de p es '.get_class($p).'</br>';

        if (class_exists('Producto')) {
            echo 'La clase Producto existe </br>';
        }

        echo '</br>';

        class_alias('Producto', 'Articulo');
        $p1 = new Articulo('324123');
        $p2 = new Producto('1234');
        echo get_class($p1).'</br>';
        echo get_class($p2).'</br>';

        print_r(get_class_methods('Producto'));
        echo '</br>';

        if (method_exists('Producto', 'muestra')) {
            $p->muestra();
            echo '</br>';
        }

        print_r(get_class_vars('Producto'));
        echo '</br>';

        print_r(get_object_vars($p));
        echo '</br>';

        if (property_exists('Producto', 'color')) {
            echo $p->color;
            echo '</br>';
        }

        $a = $p;
        echo $p->color;
        echo '</br>';
        $p->color = 'verde';
        echo 'El color de a es: '.$a->color;
        echo '</br>';
        
        $b = clone($p);
        echo 'El color de p es: '.$p->color;
        echo '</br>';
        $p->color = 'rojo';
        echo 'El color de b es: '.$b->color;
        echo '</br>';
        echo 'El color de p es: '.$p->color;
        echo '</br>';
        
        $c = clone($p);
        echo '</br></br>';
        
        var_dump($p);
        echo '</br></br>';
        $c = serialize($p);
        $_SESSION['obj_producto'] = $c;
        var_dump($c);
        $pp = unserialize($c);
        echo '</br></br>';
        var_dump($pp);
        echo '</br></br>';
        $pp->muestra();
        echo '</br></br>';
    
    ?>
</body>
</html>