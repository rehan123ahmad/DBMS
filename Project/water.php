<?php
$showalert = false;
$showerror = false;
$login = false;
$drive = false;
$result = null;
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}else{
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $con1 = mysqli_connect('127.0.0.1:3306', 'root', '','e_software');
$date = $_POST["Date"];
$username = $_SESSION['username'];
$Drinking = $_POST["Drinking"];
$Bathing = $_POST["Bathing"];
$Cooking = $_POST["Cooking"];
$Washing = $_POST["Washing"];
$Cleaning = $_POST["Cleaning"];
$Gardening = 0;
$other= $_POST["other"];
$result = $_SESSION["result"];

    $sql = "INSERT INTO `water` (`NAME` , `Date` , `Drinking` , `Bathing`, `Cooking`,`Washing`,`Cleaning`,`Gardening`,`other`,`Total`) VALUES ('$username', '$date', '$Drinking','$Bathing','$Cooking','$Washing','$Cleaning','$Gardening','$other','$result')";
    $rs = mysqli_query($con1, $sql);
    if($rs){
   $showalert = true;
   $drive = true;
    }   else{
  $showerror = " ***** Did not submit ***** ";
 }
}   
}
 ?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width"/>
    <link rel="icon" type="image" href="images\favicon.ico.png"> 
<title>Save Water</title>
    <!-- <link rel="stylesheet" href="./global.css" /> -->
    <link rel="stylesheet" href="./water.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700;800&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inria Sans:wght@700&display=swap"
    />
  </head>
  <body>
    <?php

if($showalert){
  echo '
   <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Successfully submitted!!!</strong> Your Result is Ready <strong>At Bottom </strong>!!!
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

    ?>
    <div class="calculation">
      <div class="calculation-child"></div>
      <div class="e-software">E-Software
        <img src="./images/logo.jpg">
      </div>
      <div class="calculation-item"></div>
      <div class="calculation-inner"></div>
      <div class="line-div"></div>
      <div class="calculation-child1"></div>
      <b class="water"><a href="./water.html" style="text-decoration: none;color: black;">Water</a></b>
      <b class="fuel-gas" id="fuelGas"> <a href="./fuel.php" style="text-decoration: none;color: black;">Fuel & Gas</a> </b>
      <b class="electricity" id="electricityText"> <a href="./electricity.php" style="text-decoration: none;color: black;">Electricity</a> </b>
      <div class="rectangle-div"></div>
      <form action = "/Esoftware/water.php" method = "post">
      <div class="water-usage-calculations">Water Usage Calculations</div>
      <div class="rectangle-parent">
        <input
          class="group-child"
          name="Date"
         
          type="datetime-local"
         
        />

        <b class="date-and-time">DATE AND TIME</b>
        <!-- <svg class="vector-icon" xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
            <path d="M0 30.8125C0 32.5723 1.67969 34 3.75 34H31.25C33.3203 34 35 32.5723 35 30.8125V12.75H0V30.8125ZM25 17.7969C25 17.3586 25.4219 17 25.9375 17H29.0625C29.5781 17 30 17.3586 30 17.7969V20.4531C30 20.8914 29.5781 21.25 29.0625 21.25H25.9375C25.4219 21.25 25 20.8914 25 20.4531V17.7969ZM25 26.2969C25 25.8586 25.4219 25.5 25.9375 25.5H29.0625C29.5781 25.5 30 25.8586 30 26.2969V28.9531C30 29.3914 29.5781 29.75 29.0625 29.75H25.9375C25.4219 29.75 25 29.3914 25 28.9531V26.2969ZM15 17.7969C15 17.3586 15.4219 17 15.9375 17H19.0625C19.5781 17 20 17.3586 20 17.7969V20.4531C20 20.8914 19.5781 21.25 19.0625 21.25H15.9375C15.4219 21.25 15 20.8914 15 20.4531V17.7969ZM15 26.2969C15 25.8586 15.4219 25.5 15.9375 25.5H19.0625C19.5781 25.5 20 25.8586 20 26.2969V28.9531C20 29.3914 19.5781 29.75 19.0625 29.75H15.9375C15.4219 29.75 15 29.3914 15 28.9531V26.2969ZM5 17.7969C5 17.3586 5.42188 17 5.9375 17H9.0625C9.57812 17 10 17.3586 10 17.7969V20.4531C10 20.8914 9.57812 21.25 9.0625 21.25H5.9375C5.42188 21.25 5 20.8914 5 20.4531V17.7969ZM5 26.2969C5 25.8586 5.42188 25.5 5.9375 25.5H9.0625C9.57812 25.5 10 25.8586 10 26.2969V28.9531C10 29.3914 9.57812 29.75 9.0625 29.75H5.9375C5.42188 29.75 5 29.3914 5 28.9531V26.2969ZM31.25 4.25H27.5V1.0625C27.5 0.478125 26.9375 0 26.25 0H23.75C23.0625 0 22.5 0.478125 22.5 1.0625V4.25H12.5V1.0625C12.5 0.478125 11.9375 0 11.25 0H8.75C8.0625 0 7.5 0.478125 7.5 1.0625V4.25H3.75C1.67969 4.25 0 5.67773 0 7.4375V10.625H35V7.4375C35 5.67773 33.3203 4.25 31.25 4.25Z" fill="black"/>
          </svg> -->
        <!-- <img class="vector-icon" alt="" src="./public/vector.svg" /> -->

        <!-- <div class="ddmmyyyy">dd/mm/yyyy</div> -->
      </div>
      <div class="rectangle-group">
        <div class="group-item"></div>
        <input
          class="enter-0-for-container"
          name="Drinking"
          placeholder="in litres"
          type="text"
        />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <!-- <span class="enter-0-for">Enter ‘0’ for null values</span> -->
        </span>

        <b class="drinking">Drinking*</b>
      </div>
      <div class="rectangle-container">
        <div class="group-item"></div>
        <input
          class="enter-0-for-container"
          name="Cooking"
          
          type="text"
          placeholder="in litres"
        />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <!-- <span class="enter-0-for">Enter ‘0’ for null values</span> -->
        </span>

        <b class="drinking">Cooking*</b>
      </div>
      <div class="group-div">
        <div class="group-item"></div>
        <input
          class="enter-0-for-container"
          name="Washing"
        
          type="text"
          placeholder="in litres"
        />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <!-- <span class="enter-0-for">Enter ‘0’ for null values</span> -->
        </span>

        <b class="drinking">Washing Utensils*</b>
      </div>
      <div class="rectangle-parent1">
        <div class="group-item"></div>
        <input
          class="enter-0-for-container"
          name="Cleaning"
         
          type="text"
          placeholder="in litres"
        />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <!-- <span class="enter-0-for">Enter ‘0’ for null values</span> -->
        </span>

        <b class="drinking">Cleaning*</b>
      </div>
      <div class="rectangle-parent2">
        <div class="group-item"></div>
        <div class="group-child4"></div>
        <input
          class="enter-0-for-container"
          name="other"
         
          type="text"
          placeholder="in litres"
        />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <!-- <span class="enter-0-for">Enter ‘0’ for null values</span> -->
        </span>

        <b class="drinking">Other Domestic Uses*</b>
      </div>
      <div class="rectangle-parent3">
        <div class="group-item"></div>
        <input
          class="enter-0-for-container"
          name="Bathing"
          placeholder="in litres"
          type="text"
        />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <!-- <span class="enter-0-for">Enter ‘0’ for null values</span> -->
        </span>

        <b class="drinking">Bathing*</b>
      </div>
      <?php 
     if($drive == true){
 
      // $Drinking = $_POST["Drinking"];
      // $Bathing = $_POST["Bathing"];
      // $Cooking = $_POST["Cooking"];
      // $Washing = $_POST["Washing"];
      // $Cleaning = $_POST["Cleaning"];
      // $Gardening = 0;
      // $other= $_POST["other"];
      $fix = 135;
       $result = ( $Drinking + $Bathing + $Cooking + $Washing + $Cleaning + $Gardening + $other );
       // Store the result and notifications in session variables
    $_SESSION['result'] = $result;
    $_SESSION['fix'] = $fix;
    $_SESSION['notification'] = ($result > $fix) ? "Save Water" : "Going Green";
   
    // Redirect to result.php
  echo '<button class="next" id="next" ><a href="./waterResult.php">Results</a></button>';

    exit;

      }
     ?> 
      <button class="next" id="next" type="submit">submit</button>
    </div>
    
    </form>
    <script>
      var fuelGas = document.getElementById("fuelGas");
      if (fuelGas) {
        fuelGas.addEventListener("click", function (e) {
          // Please sync "CalculationF" to the project
        });
      }
      
      var electricityText = document.getElementById("electricityText");
      if (electricityText) {
        electricityText.addEventListener("click", function (e) {
          // Please sync "CalculationG" to the project
        });
      }
      
      var next = document.getElementById("next");
      if (next) {
        next.addEventListener("click", function (e) {
          // Please sync "CalculationF" to the project
        });
      }
      </script>
  </body>
</html>
