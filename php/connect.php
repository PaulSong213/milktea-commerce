<?php

function connect()
{
    // production setup
    $servername = "sql207.infinityfree.com";
    $username = "if0_34844081";
    $Password = "wwwYlVEuaI";
    $database = "if0_34844081_zaratehostpital";

    // local setup
    $isDevelopment = true;
    if ($isDevelopment) {
        $servername = "localhost";
        $username = "root";
        $Password = "";
        $database = "zaratehospital";
    }


    $connection = new mysqli($servername, $username, $Password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}
