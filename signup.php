<?php
  include "dbConfig.php";
  session_start();
  if ($_SESSION["regNo"]) {
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
    <link rel="stylesheet" href="./static/css/style.css" />
    <link rel="stylesheet" href="./static/css/portal.css" />
    <title>Sign Up</title>
  </head>
  <body>
    <main>
      <section class="imgSection">
        <img
          class="landingImage"
          src="./static/res/signup.svg"
          alt="reading image"
        />
      </section>
      <section class="loginSection">
        <div class="loginContainer">
          <section>Library - Signup</section>
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
              <input type="submit" name="signup" value="Sign Up" />
              <div class="loginBtn">
                <a class="btnLink" href="index.php">Already have an account?</a>
              </div>
            </nav>
            <p>
            <?php echo $errorMessage ?>
</p>
          </form>
        </div>
      </section>
    </main>
  </body>
</html>
