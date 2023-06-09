<?php

//CarOwner class
namespace Exam2;
class CarOwner
{
    private $name;
    private $address;
    private $cars;

    public function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
        $this->cars = array();
    }

    public function __addCar($car)
    {
        $this->cars[] = $car;
    }

    public function __getCars()
    {
        return $this->cars;
    }

    public function __getName()
    {
        return $this->name;
    }

    public function __getAddress()
    {
        return $this->address;
    }

    public function __toString()
    {
        $output = "Name: " . $this->name . "<br>";
        $output .= "<br>Address: " . $this->address . "<br>";
        $output .= "<br>Cars: <br>";
        foreach ($this->cars as $car) {
            $output .= $car . "<br>";
        }
        return $output;
    }
}
