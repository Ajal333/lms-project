<?php
include "dbConfig.php";
session_start();
$query = "select * from Users";
$errorMessage = "";
$user = mysqli_query($conn, $query);

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
    <title>Library - Home</title>
  </head>
  <body>
    <?php include "templates/navbar.php" ?>
    <div class="heading">Available Users</div>
    <div class="table-responsive-lg">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">RegNo</th>
            <th scope="col">Username</th>
            <th scope="col">Semester</th>
            <th scope="col">Department</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
       <?php
       $count = 0;
       if(mysqli_num_rows($user) > 0){
         while($table = mysqli_fetch_array($user)) {
           $count += 1;
          echo "<tr>"; 
          echo "<th scope='row'>".$count."</th>";
          echo "<td>".$table['regNo']."</td>";
          echo "<td>".$table['username']."</td>";
          echo "<td>".$table['sem']."</td>";
          echo "<td>".$table['department']."</td>";
          echo "<td><a href='deleteUser.php?id=".$table['regNo']."'>Delete</a></td>";
          echo "</tr>";
         }
      }else {
        echo "<p class='dangerText'>No data found</p>";
      }
       ?>
        </tbody>
      </table>
    </div>
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
