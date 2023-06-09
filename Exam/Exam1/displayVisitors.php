<?php
require_once 'login.php';

//Connect to MySQL Server: create a new object named $pdo
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//Write your code below to display all the visitors in the Visitors table:
$query_display_visitors = "SELECT * FROM visitors";
$query_display_visitors = "SELECT * FROM oharvey.visitors";
if (!($result = $pdo->query($query_display_visitors))){
    echo "Error: " . $query_display_visitors . "<br>" . $pdo->error;
}
else{
    echo "<table border=\"1\">\n";
    echo "<tr><th>First Name</th><th>Last Name</th></tr>\n";
    while ($row = $result->fetch()){
        echo "<tr><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</td></tr>\n";
    }
    echo "</table>\n";
}


echo ">Add Guest</a></p>\n";
?>
