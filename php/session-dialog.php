<?php
// import sweetalert2
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

if (isset($_SESSION["alert_message"])) {
    $message = $_SESSION["alert_message"];
    $alertType = "info";
    if (isset($_SESSION["alert_message_success"])) $alertType = "success";
    if (isset($_SESSION["alert_message_error"])) $alertType = "error";

    // fire sweetalert2
    echo "<script>
        Swal.fire(
            `$message`,
            '',
            '$alertType'
        );
    </script>";

    // clear session
    unset($_SESSION["alert_message"]);
    unset($_SESSION["alert_message_success"]);
    unset($_SESSION["alert_message_error"]);
}
