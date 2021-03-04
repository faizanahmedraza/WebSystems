<?php
    /*
        Static methods,properties can be called directly - without creating an instance of the class first.
      */

    class Student {
        public $name;
        protected $age;
        protected $course;
        public static $institution = "High Level Tech"; //static property

        function __construct($n,$a,$c) {
            $this->name = $n;
            $this->age = $a;
            $this->course = $c;
        }

        public static function greeting() { //static method
            echo "Welcome to ";
        }

        public function getInstitution() {
            return self::$institution;
        }

        public function info() {
            echo "This is ".$this->name." of ".$this->age." years old. Its doing the ".$this->course;
        }
    }

    class Institution extends Student {
        public $institutionName;
        function __construct(){
            $this->institutionName = parent::getInstitution();
        }
    }

    $student = new Student("Fazy",21,"Information Technology");
    Student::greeting();
    echo Student::$institution;
    echo "<br>";
    $student->info();
    echo "<br>";
    $institution = new Institution();
    echo $institution->institutionName;
?>