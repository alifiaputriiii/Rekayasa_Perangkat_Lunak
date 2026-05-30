<?php
session_start();
include '../koneksi.php';

$email    = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");

if (mysqli_num_rows($query) == 0) {
    header("Location: ../index.php?page=login&error=Email tidak ditemukan");
    exit;
}

$user = mysqli_fetch_assoc($query);

if (password_verify($password, $user['password'])) {

    // ✅ Ganti 'user_id' menjadi 'id_user' agar konsisten dengan semua view
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['nama']    = $user['nama'];
    $_SESSION['role']    = $user['role'];

    // ✅ Redirect berdasarkan role
    if ($user['role'] === 'admin') {
        header("Location: ../index.php?page=dashboard");
    } else {
        header("Location: ../index.php?page=home");
    }
    exit;

} else {
    header("Location: ../index.php?page=login&error=Password salah");
    exit;
}