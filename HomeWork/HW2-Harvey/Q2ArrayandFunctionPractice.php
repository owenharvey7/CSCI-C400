<html lang="">
<head>
    <meta charset = "utf-8" />
    <title>Array and Function Practice</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
</head>

<body>

<h3>Below is a randomly generated array</h3>

<?php error_reporting(0);

//10 is the size of the array
for ($i = 0; $i < 10; $i++) {
    $numbers[$i] = rand(1, 100);
}

/**
 * @param $numbers
 * @return void
 */
function displayArray($numbers) {
    echo "<p>Array: ";
    for ($i = 0; $i < count($numbers); $i++) {
        echo $numbers[$i] . " ";
    }
    echo "</p>";
}

/**
 * @param $numbers
 * @return mixed
 */
function initialize($numbers) {
    for ($i = 0; $i < count($numbers); $i++) {
        $numbers[$i] = 1.5;
    }
    return $numbers;
}

/**
 * @param $numbers
 * @return void
 */
function findSum($numbers) {
    $sum = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        $sum += $numbers[$i];
    }
    echo "<p>Sum: " . $sum . "</p>";
}

/**
 * @param $numbers
 * @return void
 */
function findMax($numbers) {
    $max = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++) {
        if ($numbers[$i] > $max) {
            $max = $numbers[$i];
        }
    }
    echo "<p>Max: " . $max . "</p>";
}

displayArray($numbers);
findSum($numbers);
findMax($numbers);
$numbers = initialize($numbers);

echo "<p>After initializing the array to 1.5</p>";

displayArray($numbers);
findSum($numbers);
findMax($numbers);

echo "<p><a href='Q2ArrayandFunctionPractice.php'>Compute New Array</p>";

?>

</body>
</html>
