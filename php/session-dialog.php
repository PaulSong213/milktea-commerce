<?php
if (isset($_SESSION["alert_message"])) {
    $message = $_SESSION["alert_message"];
    $alertType = "alert-info";
    if (isset($_SESSION["alert_message_success"])) $alertType = "alert-success";
    if (isset($_SESSION["alert_message_error"])) $alertType = "alert-danger";
    echo "<div class='alert my-3 mx-2 " . $alertType . "' role='alert'>" . $message . "</div>";

    unset($_SESSION["alert_message"]);
    unset($_SESSION["alert_message_success"]);
    unset($_SESSION["alert_message_error"]);
}
