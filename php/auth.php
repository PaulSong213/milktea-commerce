<?php
function allowCostumerOnly()
{
    // make sure session is started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // validate if user is logged in
    if (!isset($_SESSION["costumer"])) {
        return false;
    }

    $costumer = json_decode($_SESSION["costumer"], true);
    return $costumer;
}
