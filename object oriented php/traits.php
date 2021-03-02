<?php
/* PHP only supports single inheritance: a child class can inherit only from one single parent.
    Traits are used to declare methods that can be used in multiple classes. Traits can have methods
     and abstract methods that can be used in multiple classes,and the methods can have any access modifier
     (public, private, or protected). */

    trait greeting {
        public function GoodMorning(){
            echo "Good Morning Dear!";
        }

        public function GoodAfterNooN(){
            echo "Good After Noon!";
        }

        public function GoodNight() {
            echo "Good Night!";
        }
    }

    class Student {
        protected $name;
        public function __construct($name) {
            $this->name = $name;
        }

        public function getName() {
            echo "Your Name is ".$this->name;
        }
    }

    class ITStudents extends Student {
        use greeting;
        protected $rollno;
        public function __construct($name, $rollno) {
            parent::__construct($name);
            $this->rollno = $rollno;
        }

        public function getID() {
            echo "<br>Your ID is ".$this->rollno;
        }
    }
     
    $faizan = new ITStudents('Faizan Ahmed Raza','101');
    $faizan->GoodMorning();
    $faizan->getID();
?>