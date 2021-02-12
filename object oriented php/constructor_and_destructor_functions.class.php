<?php
    class Books
    {
        public $title;
        public $price;

        /*Special function which is called automatically or autofire
        when class is instantiated*/

        public function __construct($title, $price)
        {
            $this->title = $title;
            $this->price = $price;
        }

        public function getBookDetails()
        {
            return 'The book name is "'.$this->title.'" and its price is Rs'.$this->price.".";
        }

        //Destructor method run at the end of script
        public function __destruct()
        {
            echo "<br> The destructor Function call!";
        }
    }
    $book = new Books("The Adventure", 500);
    echo $book->getBookDetails();
