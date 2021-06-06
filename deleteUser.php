
<?php
$id = $_GET['id'];
include "dbConfig.php";
// sql to delete a record
$deleteQuery = "DELETE FROM Users WHERE regNo = $id"; 

if (mysqli_query($conn, $deleteQuery)) {
    mysqli_close($conn);
    header('Location: home.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
    ?>