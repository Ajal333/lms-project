<?php
include "dbConfig.php";
session_start();
$query = "select * from Books";
$errorMessage = "";
$books = mysqli_query($conn, $query);

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
    <link rel="stylesheet" href="./static/css/home.css" />
    <title>Books</title>
  </head>
  <body>
    <?php include "templates/navbar.php" ?>
    <div class="heading">Available Books</div>
    <div class=" table-responsive-md">
      <table class="table table-striped">
      
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Book ID</th>
            <th scope="col">Book Name</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <?php if($_SESSION["isAdmin"] == 1): ?>
            <th scope="col">Actions</th>
            <?php endif; ?>
            <th scope="col">Withdraw</th>
          </tr>
        </thead>
        <tbody>
       <?php
       $count = 0;
       if(mysqli_num_rows($books) > 0){
         while($table = mysqli_fetch_array($books)) {
           $count += 1;
          echo "<tr>"; 
          echo "<th scope='row'>".$count."</th>";
          echo "<td>".$table['bid']."</td>";
          echo "<td>".$table['bname']."</td>";
          echo "<td>".$table['author']."</td>";
          echo "<td>".$table['genre']."</td>";
            if($_SESSION["isAdmin"] == 1){
           echo "<td><a href='deleteBook.php?id=".$table['bid']."'>Delete</a></td>";
        }
        echo "<td><a href='withdraw.php?id=".$table['bid']."'>Withraw</a></td>";
          echo "</tr>";
         }
      }else {
        echo "<p class='dangerText'>No data found</p>";
      }
       ?>

        </tbody>
      </table>
    </section>
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
