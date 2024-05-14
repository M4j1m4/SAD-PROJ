<?php
session_start();
include "api.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; // Fixed line
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']); // Fixed line

    if (empty($uname)) {
        header("Location: LogIn.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: LogIn.php?error=Password is required");
        exit();
    }

    $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $uname && $row['password'] === $pass) {
            echo "Logged In!";
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
            exit();
        } else {
            header("Location: LogIn.php?error= Incorrect User Name or Password");
        }
    } else {
        header("Location: LogIn.php");
        exit();
    }
}