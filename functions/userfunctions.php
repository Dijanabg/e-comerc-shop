<?php
session_start();
// if (!isset($_SESSION['message'])) {
//     session_start();
// }

include "config/dbcon.php";

function getAllActive($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE STATUS='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getAllTrending()
{
    global $conn;
    $query = "SELECT * FROM products WHERE trending='1'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getProByCategory($category_id)
{
    global $conn;
    $query = "SELECT * FROM products  WHERE category_id='$category_id' AND status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getIDActive($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getSlugActive($table, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getCartItems()
{
    global $conn;

    $user_id = $_SESSION['auth_user']['user_id'];

    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$user_id'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getOrders()
{
    global $conn;
    $user_id = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY id DESC";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;

    header('Location: ' . $url);
    exit();
}

function checkTrackingNoValid($tracking_no)
{
    global $conn;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE tracking_no='$tracking_no' AND user_id='$userId'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
