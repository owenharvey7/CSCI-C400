<?php

class Person {
    private $name;
    private $address;
    private $age;

    function __construct($name, $address, $age) {
        $this -> name = $name;
        $this -> address = $address;
        $this -> age = $age;
    }

    function getName() {
        return $this -> name;
    }

    function getAddress() {
        return $this -> address;
    }

    function getAge() {
        return $this -> age;
    }

    function setName($name) {
        $this -> name = $name;
    }

    function setAddress($address) {
        $this -> address = $address;
    }

    function setAge($age) {
        if ($age > 0)
            $this -> age = $age;
        else
            $this -> age = 0;
    }

    function __toString() {
        return "Name: " . $this -> name . "<br>Address: " . $this -> address . "<br>Age: " . $this -> age;
    }

}