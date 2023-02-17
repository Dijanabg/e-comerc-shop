<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "project3";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    echo ("Connection failed: " . mysqli_connect_error());
} else {
    //echo "Connected successfully";
}
