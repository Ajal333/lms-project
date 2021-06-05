<?php
if(isset($_POST['signup'])){ //check if form was submitted
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  $Confirmpassword = $_POST['Confirmpassword']; 

  if($username && $password && $password == $Confirmpassword) {
    header("Location: login.php")
  }
}   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../static/css/style.css" />
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
                type="Confirmpassword"
              />
            </fieldset>
            <nav>
              <input type="submit" name="signup" value="Sign Up" />
              <div class="loginBtn">
                <a class="btnLink" href="./signup.php"
                  >Already have an account?</a
                >
              </div>
            </nav>
          </form>
        </div>
      </section>
    </main>
  </body>
</html>
