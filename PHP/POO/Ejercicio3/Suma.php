<?php
    class Suma extends Operacion{
        public $titulo;
        
        public function __construct($tit, $v1, $v2) {
            echo "Entro al constructor de Suma";
            parent::__construct($v1, $v2);
            $this->titulo = $tit;
        }
    }
?>