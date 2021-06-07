<?php
include "dbConfig.php";
session_start();
$regno = $_SESSION["regNo"];
$query = "select * from taken_books where regNo=$regno;";
$errorMessage = "";
$books = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./static/css/home.css" />
    <title>Your Books</title>
  </head>
  <body>
    <?php include "templates/navbar.php" ?>
    <div class="heading">Books Withdrawn</div>
    <div class=" table-responsive-md">
      <table class="table table-striped">
      
        <thead>
          <tr>
            <th scope="col">Sl.</th>
            <th scope="col">Book ID</th>
            <th scope="col">Book Name</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <th scope="col">Date Taken</th>
            <th scope="col">Due Date</th>
            <?php if($_SESSION["isAdmin"] == 1): ?>
            <th scope="col">Return Book</th>
            <?php endif; ?>
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
          echo "<td>".$table['withdrawn_Date']."</td>";
          echo "<td>".$table['return_Date']."</td>";
          if($_SESSION["isAdmin"] == 1){
            echo "<td><a href='return.php?regNo=".$_SESSION['regNo']."&id=".$table['bid']."'><i class='fas fa-undo-alt' style='font-size: 20px; color: green'></i></a></td>";
         }
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
