<?php

function connect()
{
    $environment = "local";
    if ($environment == "demo") {
        // demo setup
        $servername = "sql207.infinityfree.com";
        $username = "if0_34844081";
        $Password = "wwwYlVEuaI";
        $database = "if0_34844081_zaratehostpital";
    } else if ($environment == "production") {
        // demo setup
        $servername = "sql305.infinityfree.com";
        $username = "if0_34996121";
        $Password = "UvZmVCNPmXoj";
        $database = "if0_34996121_zaratehospital";
    } else {
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
