<?php
include "dbConfig.php";
session_start();
  if ($_SESSION["regNo"]) {
      header("Location: books.php");
  }
$errorMessage = "";
if(isset($_POST['login'])){ //check if form was submitted
  $regNo = $_POST['regNo']; 
  $password = md5(trim($_POST['password'])); 

  if($regNo && $password) {
    $query = "Select * from Users where regNo = '$regNo';";
    $userData = mysqli_query($conn, $query);
    if(mysqli_num_rows($userData) > 0) {
      $user = mysqli_fetch_array($userData);
      if($user["password"] == $password) {
        $_SESSION["regNo"] = $user["regNo"];
        $_SESSION["isAdmin"] = $user["isAdmin"];
        header("Location: books.php");
      exit();
    }else {
      $errorMessage = "Incorrect Password.";
    }
  }else {
    $errorMessage = "User not found.";
  }
  }else{
    $errorMessage = "Enter all details to continue.";
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
    <title>Login</title>
  </head>
  <body>
    <main>
      <section class="imgSection">
        <img
          class="landingImage"
          src="./static/res/landing.svg"
          alt="reading image"
        />
      </section>
      <section class="loginSection">
        <div class="loginContainer">
          <section>Library - Login</section>
          <form class="portal" action="" method="POST">
            <fieldset>
              <legend><label for="regNo">Reg No</label></legend>
              <input id="regNo" name="regNo" type="number" />
            </fieldset>
            <fieldset>
              <legend><label for="password">Password</label></legend>
              <input id="password" name="password" type="password" />
            </fieldset>
            <nav>
              <input type="submit" name="login" value="Login" />
              <div class="loginBtn">
                <a class="btnLink" href="./signup.php">SignUp</a>
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
