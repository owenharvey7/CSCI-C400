<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Exam 2</title>
    <style type = "text/css">
        body {
            background-color: #d3d3d3;
        }
    </style>
</head>
<body>

<style> h2{
        text-align: center;
        color: #dc1b1b;
    </style>

<h2>Car Owners</h2><?php


use Exam2\CarOwner;
use Exam2\SportsCar;

require 'Car.php';


//Car Owners
    $carOwner1 = new CarOwner("John Smith", "123 Main St.");
    $carOwner2 = new CarOwner("Jane Doe", "456 Main St.");
    $carOwner3 = new CarOwner("Owen Harvey", "789 Main St.");

//Sports Cars
    $sportsCars1 = new SportsCar("Ford  ", "Mustang  ", 2018, "1234567890  ", 6);
    $sportsCars2 = new SportsCar("Porch  ", "911  ", 2018, "1234567890  ", 10);
    $sportsCars3 = new SportsCar("Lamborghini  ", "Aventador  ", 2018, "1234567890  ", 12);


//Sedan Cars
    $sedanCars1 = new SedanCar("Chevy  ", "Cruz  ", 2016, "1234567890  ", 4, 8);
    $sedanCars2 = new SedanCar("Toyota  ", "Camry  ", 2017, "0987654321  ", 4, 12);
    $sedanCars3 = new SedanCar("Honda  ", "Accord  ", 2018, "0987654321  ", 4, 10);



$carOwner1->__addCar($sportsCars1);
$carOwner1->__addCar($sedanCars3);

$carOwner2->__addCar($sedanCars1);
$carOwner2->__addCar($sedanCars2);

$carOwner3->__addCar($sportsCars2);
$carOwner3->__addCar($sportsCars3);



//created a border around the car owner's name, address, and the cars they own
echo "<style> h3{
            border: 1px solid black
            } </style>";

//Made the h3 font size 16
    echo "<style> h3{
        font-size: 16px
        } </style>";

//Display Car Owners
    echo "<h3>Car Owner 1 <br><br> $carOwner1</h3>";

    echo "<h3>Car Owner 2 <br><br> $carOwner2</h3>";

    echo "<h3>Car Owner 3 <br><br> $carOwner3</h3>";


?>

</body>

