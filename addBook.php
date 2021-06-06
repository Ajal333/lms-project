<?php
 session_start();
 if ($_SESSION["isAdmin"] == 0) {
     header("Location: books.php");
 }
$errorMessage = "";
if(isset($_POST['addBook'])){ //check if form was submitted
include "dbConfig.php";
  $bname = $_POST['bname']; 
  $author = $_POST['author']; 
  $genre = $_POST['genre']; 
  $bid = $_POST['bid']; 

  if($bname && $author && $genre && $bid) {
        $bookCheckQuery = "Select * from Books where bid = '$bid';";
        $bookCheck = mysqli_query($conn, $bookCheckQuery);
        if(mysqli_num_rows($bookCheck) > 0){
            $errorMessage = "The book is already present.";
        }else{
            $query = "insert into Books(bname, author, genre, bid) values('$bname','$author','$genre','$bid');";
            $books = mysqli_query($conn, $query);
            if($books){
                header("Location: books.php");
                exit();
            }else {
                $errorMessage = "Error adding book.";
            }
    }
  }else {
      $errorMessage = "Add all details to complete adding book.";
  }
}   
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./static/css/portal.css" />
    <link rel="stylesheet" href="./static/css/addBook.css" />
    <title>Add Book</title>
  </head>
  <body>
    <?php include "templates/navbar.php" ?>

    <main>
      <div class="loginContainer">
        <section>Add Book</section>
        <form class="portal" action="" method="POST">
          <fieldset>
            <legend><label for="bname">Book Name</label></legend>
            <input id="bname" name="bname" type="text" />
          </fieldset>
          <fieldset>
            <legend><label for="author">Author</label></legend>
            <input id="author" name="author" type="text" />
          </fieldset>
          <fieldset>
            <legend><label for="genre">Genre</label></legend>
            <input id="genre" name="genre" type="text" />
          </fieldset>
          <fieldset>
            <legend><label for="bid">Book ID</label></legend>
            <input id="bid" name="bid" type="number" />
          </fieldset>
          <nav>
            <input type="submit" name="addBook" value="Add Book" />
          </nav>
          <p>
            <?php echo $errorMessage ?>
</p>
        </form>
      </div>
    </main>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
