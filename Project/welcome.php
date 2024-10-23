<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang ="UTF-8">
    <meta charset="en">
    <meta name ="viewport
    content="width=device-width,initial-scale=1.
    0">
<title>Welcome</title>
<link rel="icon" type="image" href="images\favicon.ico.png"> 
</head>
<body background= "Image\photo-output (16).jpg">
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <title>Welcome - <?php $_SESSION['username'] ?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <a class="navbar-brand" href="/loginsystem">Menu</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <li class="nav-item">
        <a class="nav-link" href="/Esoftware/logout.php">Logout</a>
      </li>
    </ul>
    </div>
</nav>
 
    <font-size: 170 ; style = "text-align : center; color:black;">
     
 </font-size>
<div class="container my-5">
<div class="container my-5"><br><br><br><br>
<div class = "frame">
<a href = "instruction.php" target="_self">
<center>
  <img  class="img"  style = "border : 550" id="img" src="./images/logo.jpg" alt= "logo" width="450" height="400">
</center>
<p style= "font-size : 150">press to proceed further !!</p> 
</a>

</div>
  </div>
</div>

  
   <style  type="text/css">
.img{
  border-color : black;
  border-style:double;
  font-size:120%;
    }
    body {
      background-image: url('./images/welcomeBg.jpg');
    background-size: cover; /* Adjust as needed */
    background-repeat: no-repeat;
    background-attachment:fixed;
    background-size: cover;
}
.frame{
      position: center;
      z-index: 1;  
      animation: frame 5s linear 1;
    }
    .p{
      font-size : 150;
    }
    @keyframes frame {
      0%{
        transform : scale(.9);
        opacity: 0;
      }
      20%{
        transform : scale(1);
        opacity: 1;
      }
      80%{
        transform : scale(.9);
        opacity: 1;
      }
     100%{
        transform : translateY(100px);
        opacity: 1;
      }
    }
 </style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
</body>
</html>