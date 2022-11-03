<?php
    try {
       $conexion = new PDO("mysql:host=localhost;dbname=dwes","root", "");
    } catch (PDOException $Exception) {
       echo $Exception->getMessage();
       echo 'No se ha podido establecer conexion';
    }
?>