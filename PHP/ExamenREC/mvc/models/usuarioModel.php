<?php
    require_once './db/DB.php';
    class Cliente {
        // Propiedades
        private $nombre;
        private $apellidos;
        private $fechaNac;
        private $dni;
        private $tipoCliente;
        private $reservasVigentes = [];
        
        // Métodos
        function __construct($nombre, $apellidos, $fechaNac, $dni, $tipoCliente, $reservasVigentes) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->fechaNac = $fechaNac;
            $this->dni = $dni;
            $this->tipoCliente = $tipoCliente;
            $this->reservasVigentes = $reservasVigentes;
        }
        
        // Getters
        function getNombre() {
            return $this->nombre;
        }
    
        function getApellidos() {
            return $this->apellidos;
        }
    
        function getDni(){
            return $this->dni;
        }

        function getTipoCliente(){
            return $this->tipoCliente;
        }

        function getReservasVigentes(){
            return $this->reservasVigentes;
        }

        // Setters
        function setNombre($nombre): void  {
            $this->nombre;
        }

        function setApellidos($apellidos): void {
            $this->apellidos;
        }

        function getfechaNac($fechaNac): void {
            $this->fechaNac = $fechaNac;
        }

        function setDni($dni): void {
            $this->dni = $dni;
        }

        function setTipoCliente($tipoCliente): void {
            $this->tipoCliente = $tipoCliente;
        }

        function setReservasVigentes($reservasVigentes): void {
            $this->reservasVigentes = $reservasVigentes;
        }

        function checkUsuario($userColName, $passColName, $tableName) : bool {
            // Conectar a la base de datos
            DB::conectarDB();
            
            // Chequear usuario y password en la tabla de autenticación
            $sql = 'SELECT '.$userColName.', '.$passColName.' FROM '.$tableName.' WHERE '.$userColName.' = ? AND '.$passColName.' = ?';
            DB::prepararQuery($sql, [$this->username, $this->password]);
            DB::ejecutarQueryPreparada();
            
            return DB::registrosAfectados() > 0;
        }
    }

    class Camarote {
        // Propiedades
        private $numero;
        private $tipo;
        private $ubicacion;
        private $planta;
        
        // Métodos
        function __construct($numero, $tipo, $ubicacion, $planta) {
            $this->numero = $numero;
            $this->tipo = $tipo;
            $this->ubicacion = $ubicacion;
            $this->planta = $planta;
        }
        
        // Getters
        function getNumero() {
            return $this->numero;
        }

        function getTipo() {
            return $this->tipo;
        }

        function getUbicacion() {
            return $this->ubicacion;
        }

        function getPlanta() {
            return $this->planta;
        }

        // Setters
        function setNumero($numero): void  {
            $this->numero;
        }

        function setTipo($tipo): void  {
            $this->tipo;
        }

        function setUbicacion($ubicacion): void  {
            $this->ubicacion;
        }

        function setPlanta($planta): void  {
            $this->planta;
        }
    }

    class Reserva {
        // Propiedades
        private $nombreCliente;
        private $numeroPersonas;
        private $fechaEmbarque;
        private $fechaDesembarque;
        private $numeroCamarote;

        // Métodos
        function __construct($nombreCliente, $numeroPersonas, $fechaEmbarque, $fechaDesembarque, $numeroCamarote) {
            $this->nombreCliente = $nombreCliente;
            $this->numeroPersonas = $numeroPersonas;
            $this->fechaEmbarque = $fechaEmbarque;
            $this->fechaDesembarque = $fechaDesembarque;
            $this->numeroCamarote = $numeroCamarote;
        }

        // Getters
        function getNombreCliente() {
            return $this->nombreCliente;
        }

        function getNumeroPersonas() {
            return $this->numeroPersonas;
        }
        
        function getFechaEmbarque() {
            return $this->fechaEmbarque;
        }
        
        function getFechaDesembarque() {
            return $this->fechaDesembarque;
        }
        
        function getNumeroCamarote() {
            return $this->numeroCamarote;
        }

        // Setters
        function setNombreCliente($nombreCliente): void {
            $this->nombreCliente;
        }

        function setNumeroPersonas($numeroPersonas): void {
            $this->numeroPersonas;
        }
        
        function setFechaEmbarque($fechaEmbarque): void {
            $this->fechaEmbarque;
        }
        
        function setFechaDesembarque($fechaDesembarque): void {
            $this->fechaDesembarque;
        }
        
        function setNumeroCamarote($numeroCamarote): void {
            $this->numeroCamarote;
        }
    }
?>