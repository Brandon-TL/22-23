<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author dwes
 */
require './config/configDB.php';

class DB {

    // Propiedades
    private static $conexion;
    private static $consulta;

    // Métodos estáticos
    public static function conectarDB() {
        // Conexión a base de datos
        $dsn = "mysql:host=" . DBHOST . ";dbname=" . DB;
        try {
            self::$conexion = new PDO($dsn, DBUSER, DBPASS, DBOPTIONS);
        } catch (PDOException $e) {
            echo "Excepción capturada: ", $e->getMessage(), (int) $e->getCode();
        }
    }
    
    public static function desconectarDB() {
        // Cierro la consulta con la base de datos
        if (self::$consulta) {
            self::$consulta = null;
        }
        // Cierro la conexión con la base de datos
        if (self::$conexion) {
            self::$conexion = null;
        }
    }

    public static function prepararQuery($sql, $params = array()) {
        // Prepara una consulta para ejectuar en la base de datos
        // Asumimos que la consulta viene con interrogantes para los parámetros
        self::$consulta = self::$conexion->prepare($sql);
        for ($i = 0; $i < count($params); $i++) {
            self::$consulta->bindParam($i+1, $params[$i]);
        }
    }
    
    public static function ejecutarQueryPreparada() : bool {
        try {
            // Ejecutamos consulta preparada
            self::$consulta->execute();
        } catch (PDOException $pexc) {
            return false;
        }
        
        return true;
    }
    
    public static function registrosAfectados() : int {
        // Devuelve el número de filas devueltas / afectadas
        return self::$consulta->rowCount();
    }
    
    public static function devuelveTodo() : array {
        // Devuelve un array con todos los datos resultantes de la última query ejecutada
        return self::$consulta->fetchAll();
    }

}

?>