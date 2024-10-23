<?php
session_start(); 
$showalert = false;
$showerror = false;
$navigate = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$con = mysqli_connect('127.0.0.1:3306', 'root', '','e_software');
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
// $cpassword = $_POST['cpassword'];
$existsql = "SELECT NAME FROM signup WHERE NAME = '$username' ";
$rs = mysqli_query($con, $existsql);
$numexistrow = mysqli_num_rows($rs);
if($numexistrow > 0){
  
 $showerror = " ***** Username Exist ***** ";
}
 else{
if(strlen($password) >= 6){
    $sql = "INSERT INTO `signup` ( `NAME`, `EMAIL`, `PASSWORD`, `Date`) VALUES ( '$username', '$email', '$password', current_timestamp())";
    $rs = mysqli_query($con, $sql);
 
    if($rs){
   $showalert = true;
   $showalert = true;
   $_SESSION['signup_success'] = true; // Set a session variable to indicate success
    }
} else{
  $showerror = " ***** Passwords lenght should be atleast 6 ***** ";
}
}
}
?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
<title>SignUp</title>
<link rel="icon" type="image" href="images\favicon.ico.png"> 

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./style.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&display=swap"
    />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
  <?php
     if($showalert){
      $navigate = true;
    echo '
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Successfully !!!</strong> Account created !!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> ';

}
if($showerror){
  echo '
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!!!</strong> '.$showerror.'
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div> ';
}
if($navigate){
  header("Location:login.html");
  exit;
}
?>
    <div class="signin-page">
      <div class="signin-page-child"></div>
      <div class="already-have-an">Already have an account?</div>
      <form  action = "/Esoftware/signUp.php" method = "post">
      <input class="signin-page-item" type="text" placeholder="" name="username" required>
        <input class="signin-page-inner" type="email" placeholder="" name="email" required>
        <input class="rectangle-div" type="password" placeholder="" name="password" required>
      <div class="password">Password</div>
      <div class="signin-page-child2" id="rectangle5"></div>
    
      <div class="sign-in"><button type="submit">Sign In</button></div>  
      <div class="e-mail">E-mail</div>
      <div class="name">Name</div>
      <img
        class="whatsapp-image-2023-10-03-at-9"
        alt=""
        src="./images/signUpFootprint.jpg"
      />

      <div class="create-account">Create Account</div>
      <div class="e-software">E-Software
        <img src="./images/logo.jpg">
      </div>
      <div class="line-div"></div>
      <div class="login" id="loginText">
        <span class="login-txt">
          <span class="span"> </span>
          <span class="login1"><a href="./login.html">Login</a></span>
        </span>
      </form>
      </div>
    </div>

    <script>
      var rectangle5 = document.getElementById("rectangle5");
      if (rectangle5) {
        rectangle5.addEventListener("click", function (e) {
          // Please sync "Instructions" to the project
        });
      }
      
      var loginText = document.getElementById("loginText");
      if (loginText) {
        loginText.addEventListener("click", function (e) {
          // Please sync "LogIn Page" to the project
        });
      }
      </script>
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
