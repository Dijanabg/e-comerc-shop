<?php
session_start();
// if (!isset($_SESSION['message'])) {
//     session_start();
// }
include "../config/dbcon.php";


function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getById($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;

    header('Location: ' . $url);
    exit();
}
function getAllOrders()
{
    global $conn;
    $query = "SELECT * FROM orders WHERE status='0' ";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function checkTrackingNoValid($tracking_no)
{
    global $conn;

    $query = "SELECT * FROM orders WHERE tracking_no='$tracking_no'";
   return mysqli_query($conn, $query);
   
}
