<?php
    /*
        Interfaces allow you to specify what methods a class should implement.
        When one or more classes use the same interface, it is referred to as "polymorphism".
        Note:
        1-Interfaces cannot have properties, while abstract classes can
        2-All interface methods must be public, while abstract class methods is public or protected
        3-All methods in an interface are abstract, so they cannot be implemented in code and 
        the abstract keyword is not necessary
        4-Classes can implement an interface while inheriting from another class at the same time
        5-it is never possible to declare a constructor in an interface
        6-Classes may implement more than one interface if desired by separating each interface with a comma.

        Warning: A class can implement two interfaces which define a method with the same name, only if 
        the method declaration in both interfaces is identical.
    */

    interface CanSound {
        public function makeSound();
    }

    interface CanFly extends CanSound {
        public function fly();
    }

    interface CanSwim {
        public function swim();
    }

    class Bird {
        public function info() {
            echo "I am a {$this->name}<br>";
            echo "I am a bird<br>";
        }
    }

    class Duck extends Bird implements CanFly, CanSwim {
        public $name;
        public function __construct($name) {
            $this->name = $name;
        }

        public function fly() {
            echo "I fly<br>";
        }

        public function makeSound() {
            echo "I sound 'quack, quack'<br>";
        }

        public function swim() {
            echo "I swim as well<br>";
        }
    }

    $duck = new Duck("Beautiful Duck");
    $duck->info();
    $duck->fly();
    $duck->sound();
    $duck->swim();

    /*
        We can achieve multiple inheritances by implementing the interfaces.
        interface a {}
        interface b {}
        interface c extends a , b {} 
        class ABC implements c {}  
    */
?>