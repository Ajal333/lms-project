
<?php
$id = $_GET['id'];
include "dbConfig.php";
// sql to delete a record
$deleteQuery = "DELETE FROM Books WHERE bid = $id"; 

if (mysqli_query($conn, $deleteQuery)) {
    mysqli_close($conn);
    header('Location: books.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
    ?>