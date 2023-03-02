<!DOCTYPE html>

<html lang="">
<head>
    <meta charset = "utf-8" />
    <title>Course Pass/Fail Calculator</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
</head>

<body>

<h3>Enter your Course and Your grade (1-100)</h3>

<form action = "Lab1.php" method = "get">

    Enter Course ID: <label>
        <input type = "text" name = "CourseID">
    </label>
    <p>

    Enter Grade: <label>
        <input type = "number" name = "grade">
    </label>
    <p>

    <p>

        <input type="submit" name="submitButton" id="submitButton" value="Get Pass/Fail" />
    <input type="reset" name="resetButton" id="resetButton" value="Reset" />

</form>


<?php
$CourseID = $_GET["CourseID"];
$Grade = $_GET["grade"];


if($CourseID == "CSCI400" || $Grade == "CSCI343" || $Grade == "") {
    if($Grade > 100 || $Grade < 0) {

        echo "Invalid, enter a number between 1-100","<br>";
    } else if ($Grade >= 70) {

        echo "Congratulations, you passed ", $CourseID, " with a grade of ", $Grade,"<br>";
    } else if ($Grade > 0){

        echo "You failed ", $CourseID, " with a grade of ", $Grade,"<br>";
    }else{
        echo "Invalid, enter an integer value between 1-100","<br>";
    }
} else{
    echo "Invalid Course ID entered ", $CourseID, " is not a valid course", "<br>";
}



?>


</body>
</html>

