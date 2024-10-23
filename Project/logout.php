<?php
session_start();
echo "Logging you out.....";
session_unset();
//session_destroy();
header("Location: login.php"); // Remove the space after "Location:"
exit;
?>