<?php
$showalert = false;
$showerror = false;
$login = false;
$drive = false;
$result_E = null;
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}else{
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $con1 = mysqli_connect('127.0.0.1:3306', 'root', '','e_software');
$date = $_POST["date"];
$months_name = $_POST["months_name"];
$no_of_units = $_POST["no_of_units"];
$username = $_SESSION['username'];
$result_E = $_SESSION['result_E'];
    $sql = "INSERT INTO `electricity` (`Name`,`date`,`months_name`, `no_of_units`,`Total_E`) VALUES ('$username' ,'$date', '$months_name', '$no_of_units','$result_E')";
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
<title>Save Electricity</title>
    <link rel="stylesheet" href="./elec.css" />
    <!-- <link rel="stylesheet" href="./fuel.css" /> -->

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
  <strong>Success!!!</strong> Details Submitted to Database !!!
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
    <div class="calculationg">
      <form action = "/Esoftware/electricity.php" method = "post">
      <div class="calculationg-child"></div>
      <div class="e-software">E-Software
        <img src="./images/logo.jpg">
      </div>
      <div class="calculationg-item"></div>
      <div class="calculationg-inner"></div>
      <div class="line-div"></div>
      <div class="calculationg-child1"></div>
      <b class="water"><a href="./water.php" style="text-decoration: none;color: black;">Water</a></b>
      <b class="fuel-gas" id="fuelGas"> <a href="./fuel.php" style="text-decoration: none;color: black;">Fuel & Gas</a> </b>
      <b class="electricity" id="electricityText"> <a href="./electricity.php" style="text-decoration: none;color: black;">Electricity</a> </b>
      <div class="electricity-calculations">Electricity Calculations</div>
      <div class="rectangle-parent">
        <input class="group-child" name="date" type="datetime-local" />

        <b class="current-date">CURRENT DATE</b>
        <!-- <img class="vector-icon" alt="" src="./public/vector.svg" /> -->

        <!-- <div class="ddmmyyyy">dd/mm/yyyy</div> -->
      </div>
      <div class="rectangle-group">
        <div class="group-item"></div>
        <input class="select-from-the-container" name="months_name" placeholder="Month" type="text" />
        <span class="select-from-the-container1">
          <span class="span"> </span>
        </span>

        <b class="bill-month">Bill Month*</b>
      </div>
      <div class="rectangle-container">
        <div class="group-item"></div>
        <input class="select-from-the-container" placeholder="Given on the electricity bill" name="no_of_units" type="text" />
        <span class="select-from-the-container1">
          <span class="span"> </span>
          <!-- <span class="select-from-the">Given on the electricity bill</span> -->
        </span>

        <b class="bill-month">No. of units i.e KWH used*</b>
      </div>
      
      <!-- <img class="vector-icon1" alt="" src="./public/vector1.svg" /> -->
      <?php 
     if($drive == true){
      $no_of_units = $_POST["no_of_units"];
      $fix_E = 23.27;
      
      $electricity_months  = ( $no_of_units *0.95); 
     //  $electricity_day = ($units/30.5);
    //  $result = $electricity_day*0.95;
    $result_E = $electricity_months;
    $_SESSION['result_E'] = $result_E;
    $_SESSION['fix_E'] = $fix_E;
    $_SESSION['notification'] = ($result_E > $fix_E) ? "Save Fuel and Gas" : "Going Green";   
      // Redirect to result.php
echo '<button class="next1" id="next" ><a href="./fuelResult.php">Results</a></button>';  
       exit;
         }
         ?>
          <button class="next1" id="next" type="submit" >submit</button>
      </form>
    </div>

    <script>
      var waterText = document.getElementById("waterText");
      if (waterText) {
        waterText.addEventListener("click", function (e) {
          // Please sync "Calculation" to the project
        });
      }
      
      var fuelGas = document.getElementById("fuelGas");
      if (fuelGas) {
        fuelGas.addEventListener("click", function (e) {
          // Please sync "CalculationF" to the project
        });
      }
      </script>
  </body>
</html>
