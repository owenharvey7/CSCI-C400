namespace Exam2;
namespace Exam2;


<?php
/*
Consider the following problem specification:

The system stores information about two things: Cars and CarOwners.
A car has attributes for make, model, year and vin number.
The owner has attributes for name and address.
Assume that a car must be owned by one owner, and an owner can own many cars, but an owner might not own any cars (perhaps the owner just sold them all, but we still want a record of that owner in the system).
The system should account for two different kinds of cars, SportsCars and SedanCars.
A sport car has additional attributes for race stats.
A sedan car has attributes for a number of doors and trunk size.


Create a UML diagram for this system.
Implement all classes in your diagram using the PHP programming language.
Implement the relationships, Aggregation between Car and CarOwner (include an instance of CarOwner in class Car) and Inheritance between class Car and its sub-classes SedanCar and SportsCar.
Include a setter and getter methods for each attribute in each class.
Also, make sure to use the toString() method whenever appropriate to translate the object’s state into text.
Add other methods as necessary.


Create a test program named UseCars.php that should make use of the above classes and displays some results.
In this test program, you may create a few car owners, and a few sedan and sport cars

*/

require 'CarOwner.php';


//Car Class
abstract class Car
{
    //Attributes
    private $make;
    private $model;
    private $year;
    private $vin;

    //Constructor
    function __construct($make, $model, $year, $vin)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->vin = $vin;
    }

    //Setters
    public function __setMake($make)
    {
        $this->make = $make;
    }

    public function __setModel($model)
    {
        $this->model = $model;
    }

    public function __setYear($year)
    {
        $this->year = $year;
    }

    public function __setVin($vin)
    {
        $this->vin = $vin;
    }

    //Getters
    public function __getMake()
    {
        return $this->make;
    }

    public function __getModel()
    {
        return $this->model;
    }

    public function __getYear()
    {
        return $this->year;
    }

    public function __getVin()
    {
        return $this->vin;
    }

    //toString
    public function __toString()
    {
        return "Make: " . $this->make . " Model: " . $this->model . " Year: " . $this->year . " Vin: " . $this->vin;
    }
}

//sub class SportsCar
final class SportsCar extends Car
{
    private $raceStats;

    function __construct($make, $model, $year, $vin, $raceStats)
    {
        parent::__construct($make, $model, $year, $vin);
        $this->raceStats = $raceStats;
    }

    public function __setRaceStats($raceStats)
    {
        $this->raceStats = $raceStats;
    }

    public function __getRaceStats()
    {
        return $this->raceStats;
    }

    public function __toString()
    {
        return parent::__toString() . " Race Stats: " . $this->raceStats;
    }
}


//SedanCar Class
final class SedanCar extends Car
{
    private $numDoors;
    private $trunkSize;

    function __construct($make, $model, $year, $vin, $numDoors, $trunkSize)
    {
        parent::__construct($make, $model, $year, $vin);
        $this->numDoors = $numDoors;
        $this->trunkSize = $trunkSize;
    }

    //Setters
    public function __setNumDoors($numDoors)
    {
        $this->numDoors = $numDoors;
    }

    public function __setTrunkSize($trunkSize)
    {
        $this->trunkSize = $trunkSize;
    }

    //Getters
    public function __getNumDoors()
    {
        return $this->numDoors;
    }

    public function __getTrunkSize()
    {
        return $this->trunkSize;
    }

    //toString
    public function __toString()
    {
        return parent::__toString() . " Number of Doors: " . $this->numDoors . " Trunk Size: " . $this->trunkSize;
    }
}


