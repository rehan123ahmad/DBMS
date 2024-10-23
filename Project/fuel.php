<?php
$showalert = false;
$showerror = false;
$login = false;
$drive = false;
$result_C = null;
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}else{
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $con1 = mysqli_connect('127.0.0.1:3306', 'root', '','e_software');
$Date = $_POST["date"];
$Distance = $_POST["distance"];
$Mileage = $_POST["mileage"];
$LPG = $_POST["LPG"];
$username = $_SESSION["username"];
$result_C = $_SESSION["result_C"];
    $sql = "INSERT INTO `fuels` (`Name`,`date`,`distance`, `mileage`, `LPG` , `Total_C`) VALUES ('$username', '$Date', '$Distance', '$Mileage','$LPG','$result_C')";
    $rs = mysqli_query($con1, $sql);
    if($rs){
   $showalert = true;
   $drive = true;
    }
    else{
  $showerror = " ***** Did not submit ***** ";
 }
   }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" type="image" href="images\favicon.ico.png"> 
<title>Save Fuels</title>
    <!-- <link rel="stylesheet" href="./global.css" /> -->
    <link rel="stylesheet" href="./fuel.css" />
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
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <div class="calculationf">
      <form action = "/Esoftware/fuel.php" method = "post">
      <div class="calculationf-child"></div>
      <div class="calculationf-item" id="rectangle1"></div>
      <div class="e-software">E-Software
        <img src="./images/logo.jpg">
      </div>
      <div class="calculationf-inner"></div>
      <div class="line-div"></div>
      <div class="calculationf-child1"></div>
      <div class="calculationf-child2"></div>
      <b class="water"><a href="./water.php" style="text-decoration: none;color: black;">Water</a></b>
      <b class="fuel-gas" id="fuelGas"> <a href="./fuel.php" style="text-decoration: none;color: black;">Fuel & Gas</a> </b>
      <b class="electricity" id="electricityText"> <a href="./electricity.php" style="text-decoration: none;color: black;">Electricity</a> </b>
      <div class="rectangle-div"></div>
      <div class="fuel-gasusage">Fuel & Gas Usage Calculations</div>
      <div class="rectangle-parent">
        <input class="group-child" placeholder="dd/mm/yy" type="datetime-local" name="date"/>

        <b class="date-and-time">DATE AND TIME</b>
        <!-- <img class="vector-icon" alt="" src="./public/vector.svg" /> -->

        <div class="ddmmyyyy"></div>
      </div>
      <div class="rectangle-group">
        <div class="group-item"></div>
        <input
          class="enter-0-for-container"
          placeholder="in KM/L"
          type="text"
          name="mileage"
        />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <!-- <span class="enter-0-for">Enter ‘0’ for null values</span> -->
        </span>
        <b class="average-mileage-of">Average Mileage of your Medium*</b>
      </div>
      <div class="rectangle-container">
        <div class="group-item"></div>
        <input class="enter-0-for-container" placeholder="in KM" type="text" name="distance" />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <!-- <span class="enter-0-for">Enter ‘0’ for null values</span> -->
        </span>

        <b class="average-mileage-of">Average Distance Travelled*</b>
      </div>
      <!-- <div class="group-div">
        <div class="group-item"></div>
        <input class="enter-0-for-container" type="text" />
        <span class="enter-0-for-container1">
          <span class="span"> </span>
          <span class="enter-0-for">Select from the menu</span>
        </span>

       
      </div> -->
      <?php 
     if($drive == true){
      //  $Mileage = $_POST["mileage"];
      //  $LPG = $_POST["LPG"];
      $fix_C = 23.27;
      
       $fuel_litres = ( $Distance / $Mileage); 
       $carbon_fuel = ($fuel_litres * 2.5);
       $lpg_litres = ($LPG * 27.8);
        $carbon_lpg = ($lpg_litres * 1.6);
        $result_C = round($carbon_fuel + $carbon_lpg, 2);
        $_SESSION['result_C'] = $result_C;
        $_SESSION['fix_C'] = $fix_C;
        $_SESSION['notification'] = ($result_C > $fix_C) ? "Save Fuel and Gas" : "Going Green";   
          // Redirect to result.php
  echo '<button class="next1" id="next" ><a href="./fuelResult.php">Results</a></button>';
  exit;
         }
     ?> 

      <button class="next1" id="next" type="submit" >submit</button>
      <!-- <img class="vector-icon1" alt="" src="./public/vector1.svg" /> -->

      <div class="rectangle-parent1">
        <div class="group-item"></div>
        <input class="enter-0-for2" type="text" placeholder="1 or 2 or 3....." name="LPG" />

        <b class="average-mileage-of">No. of LPG Cylinders used in a month*</b>
      </div>
      <!-- <div class="rectangle-parent2">
        <div class="group-item"></div>
        <b class="enter-0-for-container4">
          <span class="enter-0-for-container1">
            <span> </span>
            <span class="enter-0-for">Enter ‘0’ for null values</span>
          </span>
        </b>
        <b class="average-mileage-of">LPG Gas Units*</b>
      </div> -->
      </form>
    </div>

    <script>
      var rectangle1 = document.getElementById("rectangle1");
      if (rectangle1) {
        rectangle1.addEventListener("click", function (e) {
          // Please sync "CalculationG" to the project
        });
      }
      
      var waterText = document.getElementById("waterText");
      if (waterText) {
        waterText.addEventListener("click", function (e) {
          // Please sync "Calculation" to the project
        });
      }
      
      var electricityText = document.getElementById("electricityText");
      if (electricityText) {
        electricityText.addEventListener("click", function (e) {
          // Please sync "CalculationG" to the project
        });
      }
      </script>
  </body>
</html>
