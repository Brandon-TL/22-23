<?php
    class Persona {
        protected $nombre;
        protected $apellidos;
        
        public function __construct($nombre, $apellidos) {
            // Poblar las propiedades de la clase
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
        }

        public function muestra() {
            // Mostrar el contenido de las propiedades
            print "<p>" . $this->nombre . " " . $this->apellidos . "</p>";
        }
    }
?>