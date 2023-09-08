 <?php
   session_start(); // Start or resume the existing session
   unset($_SESSION['user']);
   header("Location: ./index.php"); // Change 'login.php' to your actual login page
   exit();
   ?>

