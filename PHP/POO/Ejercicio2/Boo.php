<?php
    require_once 'abc.php';

    class Boo implements c {
        
        public function bar() {
            echo "Soy bar <br/>";
        }

        public function baz() {
            echo "Soy baz <br/>";
        }

        public function foo() {
            echo "Soy foo <br/>";
        }
    }
?>