<?php
    class Password {
        //Encapsulation
        private $userId;
        private $password = "12345678";

        public function setUserId($userId){
            $this->userId = $userId;
        }

        public function updatePassword($updtPass){
            $this->password = $updtPass;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getUserId(){
            return $this->userId;
        }
    }

    $student = new Password();
    $student->setUserId("123");
    echo "<br>";
    echo $student->getPassword();
    echo "<br>";
    $student->updatePassword("32dad2");
    echo $student->getUserId();
    echo "<br>";
    echo $student->getPassword();
?>