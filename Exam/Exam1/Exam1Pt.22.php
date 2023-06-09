<!DOCTYPE html>

<!-- Create a functioning form so people can use to add books to the database -->

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Enter Your Name to Sign the Guest Book</title>
    <style type = "text/css">
        label  { width: 5em; float: left; }
        .error {
            color: #ff0000;
            font-weight: bold;
            border: 0px none;
        }
    </style>
</head>
<body>

<?php

$displayForm = true;
$inputError = false;


// Connect to MySQL Server
require_once 'login.php';

//Connect to MySQL Server: create a new object named $pdo
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
$firstName = "";
$firstName_error = "";
$lastName = "";
$lastName_error = "";

//if statement for if the form has been submitted
if (isset($_POST['addVisitor'])) {

    $firstName = $_POST['firstName'];
    if (empty($firstName))
        $firstName_error = "First Name is required";
    $lastName = $_POST['lastName'];
    if (empty($lastName))
        $lastName_error = "Last Name is required";


    if (!empty($firstName_error) || !empty($lastName_error))
        $inputError = true;

    if ($inputError == false) {
        echo "Hello $firstName $lastName!";

        $query_insert_visitors = "INSERT INTO oharvey.visitors (firstName, lastName) VALUES (\"$firstName\", \"$lastName\")";
        $result = $pdo->query($query_insert_visitors);
        if ($result) {
            echo " You were added to the database.";
        }
        else {
            echo " You were not added to the database.";
        }
        $displayForm = false;
    }




}
if ($displayForm == true) {

?>
<p>Use the following form to add a visitor to the database:</p>
<form action="Exam1Pt.22.php" method="post">
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo $firstName; ?>" />
        <span class="error"><?php echo $firstName_error; ?></span>
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $lastName; ?>" />
        <span class="error"><?php echo $lastName_error; ?></span>
    </p>
    <p>
        <input type="submit" name="addVisitor" value="Add Visitor" />
    </p>
<?php
}

echo ">View Guest Book</a></p>\n";
?>
</body>
</html>




