<!DOCTYPE html>

<!-- QueryBooks.html -->
<!-- Form to query a MySQL database. -->

<html>
<head>
    <meta charset = "utf-8">
    <title>Sample Database Query Via Form</title>
</head>
<body>
<h1>Query the books database with either option:</h1>
<form method = "post" action = "Lab3.php">
    <p><strong>Option 1</strong>: Select a field to display current book inventory:
        <select name = "bookselection">
            <option value="Select" selected>Select</option>
            <option value="*">All fields</option>
            <option value="ID">IDs Only</option>
            <option value="Title">Titles Only</option>
            <option value="Category">Categories Only</option>
            <option value="ISBN">ISBNs Only</option>
        </select>
    </p>

    <h2>OR</h2>

    <p><strong>Option 2</strong>: Select an author to display his/her books:
        <select name = "authorselection">
            <option value="Select" selected>Select</option>
            <option value="Paul Deitel">Paul Deitel</option>
            <option value="John Ulman">John Ulman</option>
            <option value="Johny Scott">Johny Scott</option>
            <option value="Norman Finkelstein">Norman Finkelstein</option>
            <option value="Tom Davis">Tom Davis</option>
        </select>

    </p>
    <p><input type = "submit" value = "Send Query"></p>



    <style type = "text/css">
        body  { font-family: sans-serif;
            background-color: white; }
        table { background-color: skyblue;
            border-collapse: collapse;
            border: 1px solid gray; }
        td    { padding: 5px; }
        tr:nth-child(odd) {
            background-color: white; }
    </style>

</form>



<?php
// Connect to MySQL Server: create a new object named $pdo
require_once 'login.php';

//get the book and author selections
$book = $_POST['bookselection'];
$author = $_POST['authorselection'];

//Connect to MySQL Server: create a new object named $pdo
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//create a query that uses either the book or author selection
if ($book == "Select" && $author == "Select") {
    echo "Please select an option";
}
else if ($book == "Select") {
    //display the author and the books they've written from books_authors table from BooksSQLScript.sql where books_authors.AID = authors.ID
    $query = "SELECT authors.Name, books.Title FROM books_authors, authors, books WHERE books_authors.AID = authors.ID AND books_authors.BID = books.ID AND authors.Name = '$author'";
}
else if ($author == "Select") {
    $query = "SELECT $book FROM books";
}
else {
    echo "Please select only one option";
}

// Query the database into a table:

    if (!($result = $pdo->query($query))) {
        print("<p>Could not execute query!</p>");
        die("</body></html>");
    }
        ?>

<table border = "1">

    <th>Results of <?php print( "$query" ) ?> </th>

    <tr>
        <?php
        //print the column names
        for ($i = 0; $i < $result->columnCount(); $i++) {
            $meta = $result->getColumnMeta($i);
            print("<th>". htmlspecialchars($meta['name']). "</th>");
        }
        ?>
    </tr>

    <?php
    //print each entry into a table
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        print("<tr>");
        foreach ($row as $key => $value) {
            print("<td>". htmlspecialchars($value). "</td>");
        }
        print("</tr>");
    }

    ?>
</table>
        <p> Your Search Yielded

    <?php print( $result->rowCount() ) ?> results.

        <?php
        //Release the returned data to free mysql resources
        $result->close();

        //Close the database connection - free the memory you have been using
        $pdo->close();
        ?>

        </p>
    </body>
</html>
