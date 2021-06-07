
<?php
session_start();
$id = $_GET['id'];
$regNo = $_SESSION["regNo"];
include "dbConfig.php";
// sql to delete a record
$getBook = "SELECT * FROM Books WHERE bid = $id";
$deleteQuery = "DELETE FROM Books WHERE bid = $id"; 

$books = mysqli_query($conn, $getBook);
$bookData = mysqli_fetch_array($books);

$bname = $bookData["bname"];
$author = $bookData['author'];
$genre = $bookData['genre'];
$with_date = date('Y-m-d');
$return_date = date("Y-m-d", strtotime("$with_date +10 days"));


$addQuery = "INSERT INTO taken_books(bname, author, genre, bid, regNo, withdrawn_Date, return_Date) VALUES('$bname','$author','$genre','$id','$regNo', '$with_date','$return_date');";
$addToTaken = mysqli_query($conn, $addQuery);

if ($addToTaken && mysqli_query($conn, $deleteQuery) ) {
    mysqli_close($conn);
    header('Location: yourBooks.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>