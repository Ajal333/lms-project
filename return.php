
<?php
session_start();
$id = $_GET['id'];
$regNo = $_SESSION["regNo"];
include "dbConfig.php";
// sql to delete a record
$getBook = "SELECT * FROM taken_books WHERE bid = $id";
$deleteQuery = "DELETE FROM taken_books WHERE bid = $id"; 

$books = mysqli_query($conn, $getBook);
$bookData = mysqli_fetch_array($books);

$bname = $bookData["bname"];
$author = $bookData['author'];
$genre = $bookData['genre'];

echo $bname;

$addQuery = "INSERT INTO Books(bname, author, genre, bid) VALUES('$bname','$author','$genre','$id');";
$addToTaken = mysqli_query($conn, $addQuery);

if ($addToTaken && mysqli_query($conn, $deleteQuery) ) {
    mysqli_close($conn);
    header('Location: yourBooks.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>