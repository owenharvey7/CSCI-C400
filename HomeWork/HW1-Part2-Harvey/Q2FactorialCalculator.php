<!DOCTYPE html>

<html lang="">
<head>
    <meta charset = "utf-8" />
    <title>Factorial Calculator </title>
    <link rel="stylesheet" type="text/css" href="common.css" />
</head>

<body>

<h3>Enter the Minutes you Spent Doing Each Activity Below</h3>

<form action = "Q2FactorialCalculator.php" method = "get">

    Enter the Number you would like the Factorial for: <label>
        <input type = "number" name = "factorial">
    </label>
    <p>


    <p>

    <td><input type="reset" name="resetButton" id="resetButton" value="Reset" /></td>
    <td><input type="submit" name="submitButton" id="submitButton" value="Submit" /></td>
</form>


<?php
$total = 1;
$factorial = $_GET["factorial"];
for ($i = 1; $i <= $factorial; $i++) {
    $total = $total * $i;
}

echo "The factorial of ", $_GET["factorial"], "! = ", $total;


?>


</body>
</html>


