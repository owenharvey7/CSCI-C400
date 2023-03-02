<!DOCTYPE html>

<html lang="">
<head>
    <meta charset = "utf-8" />
    <title>Integer to Text Generator </title>
    <link rel="stylesheet" type="text/css" href="common.css" />
</head>

<body>

<h3>Enter the Integers Below</h3>

<form action = "Q3IntToTextGenerator.php" method = "get">

    Enter Numbers to Convert to Text: <label>
        <input type = "number" name = "factorial">
    </label>
    <p>


    <p>

    <input type="reset" name="resetButton" id="resetButton" value="Reset" />
    <input type="submit" name="submitButton" id="submitButton" value="Submit" />
</form>


<?php
$number = $_GET["factorial"];
$number = str_split($number);
echo $_GET["factorial"], " is ";
echo "<br>";
foreach ($number as $value) {
    switch ($value) {
        case 0:
            echo "Zero";
            break;
        case 1:
            echo "One";
            break;
        case 2:
            echo "Two";
            break;
        case 3:
            echo "Three";
            break;
        case 4:
            echo "Four";
            break;
        case 5:
            echo "Five";
            break;
        case 6:
            echo "Six";
            break;
        case 7:
            echo "Seven";
            break;
        case 8:
            echo "Eight";
            break;
        case 9:
            echo "Nine";
            break;
    }
    echo "<br>";
}





?>


</body>
</html>


