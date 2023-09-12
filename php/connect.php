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
        // azure bitnami setup
        //https://docs.bitnami.com/aws/faq/get-started/access-phpmyadmin/
        $servername = "localhost";
        $username = "root";
        $Password = "IeUrXz+mL/6.";
        $database = "zaratehospital";
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
