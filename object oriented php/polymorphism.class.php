<?php
/*
    According to the Polymorphism principle, methods in
    different classes s should have the same name and parameters
    but provide different functionality.
                                or
    Same operation may be behave differently in different classes

    There are two types of Polymorphism; they are:
    Static or Compile time (method overloading)
    Dynamic or Run time (method overriding)
    Note: PHP doesn't support method overloading concept

    Two ways to implement Polymorphism(method overriding) in php
    1-Abstract Classes
    2-Interface
*/
//By Abstract

abstract class Class1
{
    abstract public function fun();
}

class Class2 extends Class1
{
    public function fun()
    {
        echo "Class1 Func<br>";
    }
}

class Class3 extends Class2
{
    public function fun()
    {
        echo "Class2 Func<br>";
    }
}

$obj = new Class2();
$obj->fun();
$obj1 = new Class3();
$obj->fun();

//By Interface

interface Shape {
    public function calcArea();
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius){
        $this->radius = $radius;
    }

    public function calcArea(){
        return $this->radius * $this->radius * pi();
    }
}

class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width,$height){
        $this->width = $width;
        $this->height = $height;
    }

    public function calcArea(){
        return $this->width * $this->height;
    }
}

$circle = new Circle(3);
$rectangle = new Rectangle(3,4);
echo $circle->calcArea()."<br>";
echo $rectangle->calcArea();
