<?php
if(isset($_POST['login'])){ //check if form was submitted
  $username = $_POST['username']; 
  $password = $_POST['password']; 

  if($username && $password) {
    header("Location: home.php");
    exit();
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
              <legend><label for="username">Username</label></legend>
              <input id="username" name="username" type="text" />
            </fieldset>
            <fieldset>
              <legend><label for="password">Password</label></legend>
              <input id="password" name="password" type="password" />
            </fieldset>
            <nav>
              <input type="submit" name="login" value="Login" />
              <div class="loginBtn">
                <a class="btnLink" href="./pages/Signup/index.html">SignUp</a>
              </div>
            </nav>
          </form>
        </div>
      </section>
    </main>
  </body>
</html>
