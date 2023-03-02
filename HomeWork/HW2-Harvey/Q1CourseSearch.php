<!DOCTYPE html>

<html lang="">
<head>
    <meta charset = "utf-8" />
    <title>Course Search</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
</head>

<body>

<h3>Enter the course you are looking for</h3>

<form action = "Q1CourseSearch.php" method = "get">


    Enter Course ID: <label>
        <input type = "text" name = "CourseID">
    </label>
    <p>

    <p>

        <input type="submit" name="submitButton" id="submitButton" value="Search For Class" />
        <input type="reset" name="resetButton" id="resetButton" value="Reset" />

</form>


<?php error_reporting(0); ?>

<?php


$CourseID = $_GET["CourseID"];

$Courses = array("C400", "I262", "C343", "I400", "I211");

function sequentialSearch($CourseID, $Courses): bool
{
    for ($i = 0; $i < count($Courses); $i++) {
        if ($CourseID == $Courses[$i]) {
            return true;
        }
    }
    return false;
}

if (sequentialSearch($CourseID, $Courses)) {
    echo "<p>Course is available</p>";
} else {
    echo "<p>Course is not available</p>";
}

?>

</body>
</html>

