<?php

function connect()
{
    $servername = "localhost";
    $username = "root";
    $Password = "";
    $database = "zaratehospital";
    $connection = new mysqli($servername, $username, $Password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}
