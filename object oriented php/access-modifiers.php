<?php
    /*  Properties and methods can have access modifiers which control where they can be accessed.
    
        There are three access modifiers:
        public - the property or method can be accessed from everywhere. This is default
        protected - the property or method can be accessed within the class and by classes derived from that class
        private - the property or method can ONLY be accessed within the class
    */

    class Fruit {
        public $name;
        protected $color;
        private $weight;

        function set_name($n) { //by default public
            $this->name = $n;
        }

        protected function set_color($c) {  //a protected function
            $this->color = $c;
        }

        private function set_weight($w) { //a private function
            $this->weight = $w;
        }
    }

    $mango = new Fruit();
    $mango->name = "Mango";
    //$mango->color = "Yellow";//error
    //$mango->set_color('Yellow');//error
    //$mango->weight = "25g";//error
    //$mango->set_weight('20g');//error
?>