<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
<title>Fuel and Gas Results</title>
<link rel="icon" type="image" href="images\favicon.ico.png"> 
    <!-- <link rel="stylesheet" href="./global.css" /> -->
    <link rel="stylesheet" href="./result.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap"
    />
    <style>
      @keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

      </style>
  </head>
  <body>
    <div class="result">
      <div class="result-child"></div>
      <div class="results">Results</div>
      
      <!-- <div class="the-total-number">
        The total number of Carbon Footprints emitted by you is
      </div>
      <div class="the-total-number1">
        The total number of Carbon Footprints emitted by you is .
      </div> -->
      <?php
session_start(); // Start the session
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
} else if (isset($_SESSION['result_C']) && isset($_SESSION['notification'])) {
// Check if the session variables are se (isset($_SESSION['result']) && isset($_SESSION['notification'])) {
    $result_C = $_SESSION['result_C'];
    $fix_C = $_SESSION['fix_C'];
    $notification = $_SESSION['notification'];
    $username = $_SESSION['username'];
    // Output the result and notification on this page
    echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;'>"; // Centering container
echo "<h1 style='font-size: 40px;z-index: inherit ;position:relative;top: 50px;left: 200px; font-family: TimesNewRoman; animation: blink 1s infinite;'>!! $notification !!</h1>";
echo "<h1 style='font-size: 40px;z-index: inherit ;position:relative;top: 50px;left: 200px; font-family: TimesNewRoman;'>$username </h1>";
echo "<p1 style='font-size: 36px; z-index: inherit ;position:relative;top: 50px;left: 200px;font-family: TimesNewRoman; color: " . (($result_C > $fix_C) ? "red" : "green") . ";'> Carbon You Emitted today is $result_C litres of CO2</p1>";
echo "</div>"; // Close centering container
echo '<button class="next" id="next" ><a style="text-decoration: none; border: 2px solid; border-radius:5px;color:black;"href="./electricity.php">Next</a></button>';

    
    // Clear the session variables
    // unset($_SESSION['result']);
    // unset($_SESSION['notification']);
} else {
    // Handle the case when session variables are not set (e.g., if user directly visits result.php)
    echo "No data available.";
}
?>

    </div>
  </body>
</html>
