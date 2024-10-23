<?php
session_start(); // Start the session
// Check if the session variable is set and if it's true
if (isset($_SESSION['signup_success']) && $_SESSION['signup_success']) {
  // Display a success message
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Successfully !!!</strong> Account created !!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> ';
  // Reset the session variable to prevent displaying the message again on refresh
  $_SESSION['signup_success'] = false;
}
 $login = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$con = mysqli_connect('127.0.0.1:3306', 'root', '','e_software');
$username = $_POST["username"];
$password = $_POST["password"];
 $sql = " SELECT * FROM signup where NAME ='$username' AND PASSWORD ='$password'";
    $rs = mysqli_query($con , $sql);
    $num = mysqli_num_rows($rs);
   if($num == 1){
       $login = true;
       $_SESSION['loggedin'] = true;
       $_SESSION['username'] = $username;
       header("location: welcome.php");
     
 }
 else{
  $showerror = "Invalid Credentials";
}
}
?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
  <title>Login</title>
<link rel="icon" type="image" href="images\favicon.ico.png"> 

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./login.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&display=swap"
    />
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <form action = "/Esoftware/login.php" method = "post">
    <div class="login-page">
      <div class="login-page-child"></div>
      <img
        class="whatsapp-image-2023-10-03-at-9"
        alt=""
        src="./images/signUpFootprint.jpg"
      />

      <div class="e-software">E-Software
        <img src="./images/logo.jpg">
      </div>
      <input class="login-page-item" type="text" placeholder="" name="username" required>
      <div class="e-mail">Name</div>
      <div class="already-have-an">Didn't have an account?</div>
          <span class="login2" style="color:black;"><a href="./signUp.php">SignUp</a></span>
      <div class="login-page-inner" id="rectangle2"></div>
      <input class="rectangle-div" type="password" placeholder="" name="password" required>
      <div class="password">Password</div>
      <div class="sign-in"><button type="submit">Log In</button></div>
      <div class="line-div"></div>
      <div class="log-in1">Log In</div>
    </div>
</form>
    <script>
      var rectangle2 = document.getElementById("rectangle2");
      if (rectangle2) {
        rectangle2.addEventListener("click", function (e) {
          // Please sync "Instructions" to the project
        });
      }
      </script>
  </body>
</html>
