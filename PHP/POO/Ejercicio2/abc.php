<?php
    interface a {
        // Métodos
        public function foo();
    }

    interface b {
        public function bar();
    }

    interface c extends a, b {
        public function baz();
    }
?>