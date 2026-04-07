<?php
session_start();
include '../Server/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['email']    = $user['email'];

        if (isset($_POST['remember'])) {
            setcookie("username", $username, time() + 3600, "/");
        }
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../login.php?error=password");
        exit();
    }
} else {
    header("Location: ../login.php?error=username");
    exit();
}
?>
