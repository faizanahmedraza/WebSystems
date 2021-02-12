<?php
    class Books {
        public $title;
        public $price;
        public $publish_on;

        public function __construct($title, $price,$publish_on)
        {
            $this->title = $title;
            $this->price = $price;
            $this->publish_on = $publish_on;
        }

        public function getBookDetails()
        {
            return 'The book name is "'.$this->title.'" and its price is Rs'.$this->price.".";
        }
    }

    class Novel extends Books {
        var $publisher;
        var $email;

        function __construct($title,$price,$publish_on,$publisher){
            parent::__construct($title,$price,$publish_on);
            $this->publisher = $publisher;
        }

        function getPublishDetails(){
            return "The book publisher is '".$this->publisher."' and it's published on ".$this->publish_on.".";
        }
    }
    $book = new Novel("The Adventure",500,"January","Fazy");
    echo $book->getBookDetails() . "<br>";
    echo $book->getPublishDetails();
?>