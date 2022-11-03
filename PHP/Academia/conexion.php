<?php
    try {
       $conexion = new PDO("mysql:host=localhost;dbname=academia","root", "");
    } catch (PDOException $Exception) {
       echo $Exception->getMessage();
       echo 'Conexión fallida';
    }
?>