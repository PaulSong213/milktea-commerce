<?php

function connect()
{
    $servername = "localhost";
    $username = "root";
    $Password = "";
    $database = "zaratehospital";
    $connection = new mysqli($servername, $username, $Password, $database);
    return $connection;
}
