<?php
//session_start();

include "../config/dbcon.php";
include_once "myfunctions.php";


if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    //check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email already registered";
        header('Location: ../register.php');
    } else {
        if ($password == $cpassword) {
            //insert user data
            $insert_query = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email','$phone','$password')";
            $insert_query_run = mysqli_query($conn, $insert_query);
            if ($insert_query_run) {
                $_SESSION['message'] = "Registreted Successfully";
                header('Location: ../login.php');
            } else {
                $_SESSION['message'] = "Something went wrong";
                header('Location: ../register.php');
            }
        } else {
            $_SESSION['message'] = "Password do not match";
            header('Location: ../register.php');
        }
    }
} else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail

        ];

        $_SESSION['role_as'] = $role_as;

        if ($role_as == 1) {
            redirect("../admin/index.php", "Welcome to dashboard");
            // $_SESSION['message'] = "Welcome to dashboard";
            // header('Location: ../admin/index.php');
        } else {
            redirect("../admin/index.php", "Logged in successfuly");
            // $_SESSION['message'] = "Logged in successfuly";
            // header('Location: ../index.php');
        }
    } else {
        redirect("../login.php", "Invalid Credentials");
        // $_SESSION['message'] = "invalid Credentials";
        // header('Location: ../login.php');
    }
}
