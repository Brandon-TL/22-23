<?php
    class Producto {
        public $nombre;
        private $color;
        private $precio;
        private $cantidad;
        private static $num_productos = 0;
        private $codigo;
        
        public function muestra() {
            echo 'El objeto ' . $this->nombre . ' tiene color ' . $this->color;
        }
    
        public function subirElPrecio($euros) {
            $this->precio += $euros;
        }
    
        public function __set($var, $valor) {
            if (property_exists(__CLASS__, $var)) {
                $this->$var = $valor;
            } else {
                echo 'No existe el atributo $var.';
            }
        }
    
        public function __get($var) {
            if (property_exists(__CLASS__, $var)) {
                return $this->$var;
            }
        }
        
        public function __construct($cod) {
            $this->codigo = $cod;
            self::$num_productos++;
        }
        
        public function __destruct() {
            self::$num_productos--;
        }
        
        public function __clone() {
            self::$num_productos++;
            echo 'clonamos usando __clone';
            echo '</br>';
        }
        
        public function getNumProductos() {
            return self::$num_productos;
        }
    
    }
    class Articulo {
        public $nombre;

        public function __set($var, $valor) {
            if (property_exists(__CLASS__, $var)) {
                $this->$var = $valor;
            } else {
                echo 'No existe el atributo'. $var;
            }
        }
    
        public function __get($var) {
            if (property_exists(__CLASS__, $var)) {
                return $this->$var;
            } else {
                echo 'No existe el atributo'. $var;
            }
        }
    }
?>