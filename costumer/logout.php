<?php
session_start(); // Start or resume the existing session

require_once('../php/connect.php');
if (isset($_SESSION['costumer'])) {
    $userData = json_decode($_SESSION['costumer'], true);
    $userID = $userData->costumerID;
}

unset($_SESSION['costumer']);
header("Location: /milktea-commerce/costumer/login.php"); // Change 'login.php' to your actual login page
exit();
