<?php
    if (!isset($_GET['controller']) || isset($_GET['controller']) && empty($_GET['controller'])) {
        //Cargar indexView.php
        $html = file_get_contents('./mvc/views/indexView.php');
        
        //Cambiar el contenido de la etiqueta {titulo} por 'Blog MVC' dentro del contenido de $html
        $html = str_replace('{titulo}', 'Blog MVC', $html);
    } else {
        //Cargar modelo y vista distintos en función de los parámetros
        switch ($_GET['controller']) {
            case 'login':
                //Cargar vista de login
                $html = file_get_contents('./mvc/views/formView.php');

                //Cargar html
                $formulario = file_get_contents('./site_media/html/loginForm.html');

                //Otras variables
                $action = './index.php?controller=usuario&action=login';

                //Recuperar contenido configurable para esa vista
                $html = str_replace('{titulo}', 'Blog MVC - Login', $html);
                $html = str_replace('{formulario}', $formulario, $html);
                $html = str_replace('{action}', $action, $html);
                break;
            case 'usuario':
                //Cargar modeloo 'usuario'
                require_once './mvc/models/'.$_GET['contoller'].'Model.php';

                //Llamar a la acción pasada por parámetro del $_GET
                if (isset($_GET['action']) && !empty($_GET['action']) && isset($_GET['username']) && isset($_GET['password'])) {
                    //Crear objetos del modelo cargado
                    $user1 = new Usuario($_POST['username'], $_POST['password']);

                    //Llamar al método checkUsuario
                    if ($user1->checkUsuario(USER_FIELD, PASS_FIELD, AUTH_FIELD)) {
                        echo "Estas autenticado en el sistema";
                    } else {
                        echo "Regresa a la pagina principal y registrate!";
                    }
                }
                break;
            default:

                break;
        }
    }
    
    //Devolver vista
    echo $html;
?>