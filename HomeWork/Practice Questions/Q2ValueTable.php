<!DOCTYPE html>

<html lang="">
<head>
    <meta charset = "utf-8" />
    <title>Value Table </title>
    <link rel="stylesheet" type="text/css"/>
</head>

<body>

<h3>Displaying multiples of 10 of your value, and the next 10 values after it</h3>

<br>

<form action = "Hw1.Q2.php" method = "get">

    Enter Your Variable N: <label>
        <input type = "text" name = "n">
    </label>
    <p>
        <input type = "submit">
</form>

<br>

<?php
echo "<table border = '1'>";
echo "<tr><th>N</th><th>N * 10</th><th>N * 100</th><th>N * 1000</th></tr>";

$n = $_GET["n"];
for ($i = 0; $i < 11; $i++) {

    echo "<tr><td>", $n, "</td><td>", $n * 10, "</td><td>", $n * 100, "</td><td>", $n * 1000, "</td></tr>";
    $n++;

}
echo "</table>";

?>


</body>
</html>

