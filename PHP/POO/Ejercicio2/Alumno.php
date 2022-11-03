<?php
    class Alumno extends Persona {
        private $notas;
        
        public function __construct($nom, $apel, $not) {
            // Construyo a partir de la clase padre
            parent::__construct($nom, $apel);
            $this->notas = $not;
        }
        
        public function muestra() {
            // Forma A: sobreescribo y uso todas las propiedades
            //echo "$this->nombre $this->apellidos $this->notas";
            //echo $this->nombre.' '.$this->apellidos.' '.$this->notas;
            
            // Forma B: utilizo el método padre y añado lo propio
            parent::muestra();
            echo $this->notas;
        }
    }
?>