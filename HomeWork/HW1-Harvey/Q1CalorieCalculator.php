<!DOCTYPE html>

<html lang="">
<head>
    <meta charset = "utf-8" />
    <title>Calorie Burning Calculator </title>
    <link rel="stylesheet" type="text/css" href="common.css" />
</head>

<body>

<h3>Enter the Minutes you Spent Doing Each Activity Below</h3>

<form action = "Q1CalorieCalculator.php" method = "get">

    Minutes Spent Swimming: <label>
        <input type = "number" name = "swimming">
    </label>
    <p>

        Minutes Spent Bicycling: <label>
            <input type = "number" name = "bicycling">
        </label>
    <p>

        Minutes Spent Jogging: <label>
            <input type = "number" name = "jogging">
        </label>
    <p>

        <input type = "submit">
</form>


<?php



//Input - Define Variables:
$Swimming = 275/60;
$Bicycling = 200/60;
$Jogging = 400/60;

//Ask the user how long they did each activity:
$SwimTime = $_GET["swimming"];
$BikeTime = $_GET["bicycling"];
$JogTime = $_GET["jogging"];


//Processing - Calculate the total calories burned:
$TotalCalories = ($Swimming * $SwimTime) + ($Bicycling * $BikeTime) + ($Jogging * $JogTime);


define("CALORIES", "Calories are a unit of energy that is used to measure the energy content of foods.");


//Output - Display the average velocity:
echo "<h2>", CALORIES, "</h2>";
echo " Calculating the total calories burned based on a user input", "</p>";
echo "When you swam for ", $SwimTime , " minutes, you burned ", round($Swimming * $SwimTime,2), " calories.<br>";
echo "When you biked for ", $BikeTime , " minutes, you burned ", round($Bicycling * $BikeTime,2), " calories.<br>";
echo "When you jogged for ", $JogTime , " minutes, you burned ", round($Jogging * $JogTime,2), " calories.<br>";
echo "The total calories burned is: ", round($TotalCalories,2), "<br>";
$PoundsLost = $TotalCalories / 3500;
echo "The total pounds lost is: ", round($PoundsLost,2);






?>


</body>
</html>

