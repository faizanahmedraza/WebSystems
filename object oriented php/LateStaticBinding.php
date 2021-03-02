<?php
    /*
        Late Binding or Static Binding
        which can be used to reference the called class in a context of static inheritance.
        Difference between static:: and self::      (:: stands for Scope Resolution Operator)
    */

    /*Limitations of self::
    For instance self:: or __CLASS__ are references to the current class
    */
    class A {
        public static function who() {
            echo __CLASS__;
        }
        public static function test() {
            self::who();
        }
    }
    
    class B extends A {
        public static function who() {
            echo __CLASS__;
        }
    }

    B::test();//A
    echo "<br>";

    /* Late Static Bindings' usage 
        Late static bindings tries to solve that limitation by introducing a 
        keyword that references the class that was initially called at runtime. 
    */
    
    class Ab {
        public static function who() {
            echo __CLASS__;
        }
        public static function test() {
            static::who(); // Here comes Late Static Bindings
        }
    }
    
    class Bc extends Ab {
        public static function who() {
            echo __CLASS__;
        }
    }
    
    Bc::test();//Bc
?>