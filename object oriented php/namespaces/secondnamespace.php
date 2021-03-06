<?php
    namespace second;

    interface A {
        public function greeting();
    }

    class ABC implements A {
        function __construct() {
            echo "\nThis is class ABC from second namespace!";
        }

        public function greeting() {
            echo "\nWelcome to ABC";
        }
    }

    class DEF implements A {
        function greeting() {
            echo "\nWelcome to DEF<br>";
        }
    }
?>