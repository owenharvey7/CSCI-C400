<!DOCTYPE html>

<html>
<head>
    <meta charset = "utf-8">
    <title>Lab 5</title>
</head>
<body>

<h2>Person Object Incrementation:</h2>


<?php
/*
 * Write a test program named UsePerson that demonstrates the class you just created.
 * Create two person objects and display each object's information.
 * Then increment the age of the person by 5 years, then display each person's info again.
 */
require 'Person.php';

$person_1 = new Person("Owen Harvey", "123 Main Street, Kokomo, IN 46904", 20);
$person_2 = new Person("Jon Harvey", "456 Main Street, Kokomo, IN 46904", 41);

echo $person_1 . "<br><br>";
echo $person_2 . "<br>";

$person_1 -> setAge($person_1 -> getAge() + 5);
$person_2 -> setAge($person_2 -> getAge() + 5);

echo "<h3>After incrementing age by 5 years:</h3>";

echo $person_1 . "<br><br>";
echo $person_2 . "<br><br>";
?>

</body>
</html>

