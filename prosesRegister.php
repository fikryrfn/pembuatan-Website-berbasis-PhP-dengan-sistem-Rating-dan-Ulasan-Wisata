<?php
include '../Server/koneksi.php';

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Cek username sudah ada
$cek = mysqli_query($koneksi, "SELECT id FROM users WHERE username = '$username'");
if (mysqli_num_rows($cek) > 0) {
    header("Location: ../register.php?error=username_taken");
    exit();
}

$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: ../login.php?success=register");
    exit();
} else {
    header("Location: ../register.php?error=failed");
    exit();
}
?>
