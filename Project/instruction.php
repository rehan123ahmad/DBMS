<!DOCTYPE html>
<html>
  <head>
    <title>Instructions</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" type="image" href="images\favicon.ico.png"> 

    <!-- <link rel="stylesheet" href="./global.css" /> -->
    <link rel="stylesheet" href="./instruction.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&display=swap"
    />
    <style>
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .proceed {
            animation: blink 1s infinite; /* Blinking animation */
        }
    </style>
  </head>
  <body>
    <div class="instructions">
      <div class="get-started-with">Get Started With e-Software</div>
      <div class="instructions-child"></div>
      <div class="fill-all-the-container">
        <p class="fill-all-the">
          1. Fill all the inputs to calculate your carbon usage daily.
        </p>
        <p class="fill-all-the">
          2. All the values you submit should be of the current day.
        </p>
        <p class="fill-all-the">
          3. Result calculated will be for that particular day only.
        </p>
        <p class="fill-all-the">
          4. Fill the date on which you are calculating the usage.
        </p>
        <p class="fill-all-the">
          5. Fill accurate values to get most accurate results.
        </p>
        <p class="fill-all-the">
          6. Click on Submit to save the values and then click Calculate.
        </p>
      </div>
      <div class="instructions-item"></div>
      <div class="instructions-inner"></div>
      <div class="note-this-application-is-onl-parent">
        <div class="note-this-application-container">
          <p class="click-on-submit">Note:-</p>
          <p class="click-on-submit">
            This application is only a guide to help you lead towards a greener
            planet . The values used for calculation are standardized by ‘ISO’ .
          </p>
        </div>
        <img class="vector-icon" alt="" src="./public/vector.svg" />
      </div>
      <div class="rectangle-div" id="rectangle1"></div>
      <div class="proceed"><a href="./water.php" style="text-decoration: none;color: black;">Start!</a></div>
      <div class="instructions1">Instructions</div>
      <div class="instructions-item"></div>

      <div class="heres-a-quick">
        Here’s a quick overview of the process from start to finish.
      </div>
    </div>

    <script>
      var rectangle1 = document.getElementById("rectangle1");
      if (rectangle1) {
        rectangle1.addEventListener("click", function (e) {
          // Please sync "Calculation" to the project
        });
      }
      </script>
  </body>
</html>
