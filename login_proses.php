<?php
include 'db/koneksi.php';
session_start(); //mulai sesi


if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php"); //ganti dengan halaman setelah login
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //ambil nilai dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM admin WHERE username= '$username' AND password = '$password'";
    $result = $koneksi->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = 'login';
        header("location: index.php"); //ganti dengan halaman setelah login
        exit();
    } else {
        header('location:login.php?error=login-error');
    }

    //tutup koneksi
    $koneksi->close();
}
