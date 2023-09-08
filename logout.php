 <?php
   session_start(); // Start or resume the existing session
   require_once('./php/connect.php');
   if (isset($_SESSION['user'])) {
      $userData = json_decode($_SESSION['user'],true);
      $userID = $userData['DatabaseID'];
      $userDepartment = $userData['departmentName'];
      $userLevel = $userData['AccessLevel'];
   }

    echo $userID;

   $action = "Log out";
   $description = "User Log out";

   $conn1 = connect();
   $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$action', '$description', NOW())";

   $result1 = mysqli_query($conn1, $sql1);
   if ($result1) {
      // success
      $_SESSION["alert_message"] = "Successfully Added an Employee";
      $_SESSION["alert_message_success"] = true;
      unset($_SESSION['user']);
      header("Location: ./index.php"); // Change 'login.php' to your actual login page
      exit();
     
   } else {
      $_SESSION["alert_message"] = "Failed to Added an Employee. Error Details: " . mysqli_error($conn);
      $_SESSION["alert_message_error"] = true;
   }
    ?>

