<?php
    class Books {
        //Member Variables, fields, properties, attributes
        var $title;

        //Memeber functions, methods, behaviour of objects
        function setTitle($par){
            $this->title = $par;
        }

        function getTitle(){
            return 'The title of the book is "'.$this->title.'"';
        }
    }

    //Creating Objects or Instantiate the class or Instances of class
    $book = new Books();
    $book->setTitle("The Pound Bank");
    echo $book->getTitle();
?>