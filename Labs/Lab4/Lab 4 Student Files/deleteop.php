<?php
//Steps to delete from a table
//validate
//check if book exists / query
// run command to delete from db
// delete from books_authors
// delete from books
// display confirmation message
?>
<?php
require_once 'login.php';
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
}
catch (PDOException $e){
    die("Could not connect to the database server!" . "</body></html>" );
    //throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//Validate
$bookid = $_POST['bookid'];
if (empty($bookid))
    $bookid_error = "Book ID is required";



//Check if book exists
$query_bookid = "SELECT ID FROM books WHERE ID = \"$bookid\"";

if (!($result = $pdo->query($query_bookid))) {

//Execute query
if (!($result = $pdo->query($query_bookid))) {
    print( "<p>Could not execute query!</p>" );
    die("</body></html>" );
} else {
    if ($result->rowCount() == 0 && !empty($bookid)) {
        $bookid_error = "Book ID does not exist";
    }
}

if (!empty($bookid_error)) {
    $inputError = true;
}

//Delete from books_authors
if($inputError == false) {
    $query_delete1 = "DELETE FROM books_authors WHERE BID = \"$bookid\"";
    if (!($result = $pdo->query($query_delete1))) {
        print( "<p>Could not execute query!</p>" );
        die("</body></html>" );
        }
    }

//Execute query
if (!($result = $pdo->query($query_delete1))) {
    print( "<p>Could not execute delete from books_authors!</p>" );
    die("</body></html>" );
} else {
    print ("<p>Deleted from books_authors</p>");
}

//Delete from books
if($inputError == false) {
    $query_delete2 = "DELETE FROM books WHERE ID = \"$bookid\"";
    if (!($result = $pdo->query($query_delete2))) {
        print( "<p>Could not execute query!</p>" );
        die("</body></html>" );
        }
    }

//Execute query
if (!($result = $pdo->query($query_delete2))) {
    print( "<p>Could not execute delete from books!</p>" );
    die("</body></html>" );
} else {
    print ("<p>Deleted from books</p>");
}

//Display confirmation message
if($inputError == false) {
    print ("<p>Book deleted successfully</p>");
}

$displayForm = false;
echo "<p><a href=\"BooksDBInsertDeleteAllOne.php\">Add or Delete another Book?</a></p>\n";
}
else{
    echo "<p>Book ID didn't exist: <a href=\"BooksDBInsertDeleteAllOne.php\">Try again?</a></p>\n";
}

?>