<?php
    /*
        Abstraction
        An abstract class is a class that contains at least one abstract method. 
        An abstract method is a method that is declared, but not implemented in
        the their own class or code.
        1- Classes defined as abstract cannot be instantiated.
        2- if the abstract method is defined as protected, the function implementation 
        must be defined as either protected or public, but not private.
        
        Note:
        PHP doesn't support multiple inheritance but by using Interfaces in PHP or using 
        Traits in PHP instead of classes, we can implement it.
        PHP support only multilevel inheritance 
    */

    abstract class Car {
        protected $name;
        protected $model;

        public function __construct($name, $model){
            $this->name = $name;
            $this->model = $model;
        }

        public function model(){
            return $this->model;
        }
        abstract public function name() : string;
        abstract public function intro();
    }

    class Audi extends Car {
        public function name() : string {
            return $this->name;
        }
        public function intro() : void {
            echo "Name: ".$this->name." Model: ".$this->model;
        }
    }
    
    $audi = new Audi("Audi 007","2019");
    echo $audi->name();
    echo $audi->model();
    $audi->intro();

    /*Multillevel Inheritance
    /refers to a mechanism where one can inherit from a derived class, thereby making this derived 
    class the base class for the new class. */

    class Class1 {
        public function fun1() {
            echo "Class1 Base Class!";
        }
    }
    class Class2 extends Class1 {
        public function fun2(){
            echo "Class2 Derived form Class1 and Base Class for Class3!";
        }
    }
    class Class3 extends Class2 {
        public function fun3(){
            echo "Class1 Derived Class!";
        }
    }
    $multilevel = new Class3();
    $multilevel->fun1();
    $multilevel->fun2();
    $multilevel->fun3();

?>