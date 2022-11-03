<?php
    error_reporting(0);
    //Para eliminar mensajes de error que impiden que se convierta
    //los datos a JSON los datos devueltos por contenido no "parseable"
    
    $provincia = $_GET["provincia"];
    $array_monumentos = array();
    
    $datos = file_get_contents("https://opendata.jcyl.es/ficheros/cct/wtur/monumentos.json");
    $datosJSON = json_decode($datos);
    
    $monumentos = $datosJSON->monumentos;

    foreach ($monumentos as $mon) {
        if ($mon->poblacion->provincia == $provincia) {
            array_push($array_monumentos, $mon);
        }
    }

    echo json_encode($array_monumentos);
?>