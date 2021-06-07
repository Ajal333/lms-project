<?php
  include "dbConfig.php";
  session_start();
  if ($_SESSION["isAdmin"] == 0) {
      header("Location: books.php");
  }
  $errorMessage = "";
if(isset($_POST['signup'])){ //check if form was submitted
  $username = $_POST['username']; 
  $password = md5(trim($_POST['password'])); 
  $Confirmpassword = md5(trim($_POST['Confirmpassword'])); 
  $sem = $_POST['sem']; 
  $department = $_POST['department']; 
  $regNo = $_POST['regNo']; 

  if($username && $password && $password && $Confirmpassword && $sem && $department && $regNo) {
    if(strcmp($password, $Confirmpassword) == 0) {
      $query = "Select * from Users where regNo = '$regNo';";
      $user = mysqli_query($conn, $query);
      if(mysqli_num_rows($user) > 0){
          $errorMessage = "The user is already registered.";
      }else{
        $addUserQuery = "Insert into Users(username, sem, department, regNo, password) values('$username','$sem','$department','$regNo','$password');";
        $addUser = mysqli_query($conn, $addUserQuery);
        echo "<script>message('Successfully created account', 'success');</script>";
        header("Location: index.php");
        exit();
  }

    }else {
      $errorMessage = "Passowords are not matching.";
    }
  }else {
    $errorMessage = "Fill in all the details to continue.";
  }
}   
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
    <link rel="stylesheet" href="./static/css/portal.css" />
    <link rel="stylesheet" href="./static/css/addBook.css" />
    <title>Add User</title>
  </head>
  <body>
    <?php include "templates/navbar.php" ?>

    <main>
      <div class="loginContainer">
        <section>Add User</section>
        <form class="portal" action="" method="POST">
            <fieldset>
              <legend><label for="username">Username</label></legend>
              <input id="username" name="username" type="text" />
            </fieldset>
            <fieldset>
            <legend><label for="sem">Semester</label></legend>
            <input id="sem" name="sem" type="number" />
          </fieldset>
          <fieldset>
            <legend><label for="department">Department</label></legend>
            <input id="department" name="department" type="text" />
          </fieldset>
          <fieldset>
            <legend><label for="regNo">Reg No</label></legend>
            <input id="regNo" name="regNo" type="number" />
          </fieldset>
            <fieldset>
              <legend><label for="password">Password</label></legend>
              <input id="password" name="password" type="password" />
            </fieldset>
            <fieldset>
              <legend>
                <label for="Confirmpassword">ConfirmPassword</label>
              </legend>
              <input
                id="Confirmpassword"
                name="Confirmpassword"
                type="password"
              />
            </fieldset>
            <nav>
              <input type="submit" name="signup" value="Add User" />
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
