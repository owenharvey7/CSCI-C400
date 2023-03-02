<!DOCTYPE html>

<html>
<head>
    <meta charset = "utf-8" />
    <title>Credit Card Number Reader</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
</head>

<body>

<h3>Please Enter Your Credit Card Number</h3>

<br>

<form action = "Q3CreditCardNumber.php" method = "get">

    Credit Card Number: <label>
        <input type = "text" name = "CCN">
    </label>
    <p>
        <input type = "submit">
</form>

<br>

<?php
$CCN = $_GET["CCN"];
$CCN = str_replace("-", "", $CCN);
$CCN = str_replace(" ", "", $CCN);

if (is_numeric($CCN)) {
    echo "Your credit card number is: ", $CCN;
} else {
    echo "Your credit card number is invalid.";
}

?>

</body>
</html>

